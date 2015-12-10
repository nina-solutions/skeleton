'use strict';

//
// Require some modules
//

var fs     = require('fs');
var path   = require('path');
var glob   = require('glob');
var Mincer = require('mincer');

//
// Get Mincer environment
//

var environment = require(__dirname + '/../../config/environment');

var laravelRoot = environment.laravelRoot;

//
// Create and compile Manifest
//

var manifest = new Mincer.Manifest(environment, laravelRoot + '/public/assets');

// TODO: Remove all `environment.paths` prefix in the relative paths of `nonJsCssPattern` var
//       instead of using hardcoded paths below '{app,{vendor,workbench}/*/*/app}/assets/**/*.*'
var nonJsCssPattern = laravelRoot + '/{app,resources,{vendor,workbench}/*/*/{app,resources}}/assets/**/*.*';

glob(nonJsCssPattern, function(err, defaultAssetPaths) {
  if (err) {
    console.error('Failed to find non-JS/CSS files: ' + (err.message || err.toString()));
  }
  try {
    // The default matcher for compiling files includes app.js, app.css
    //  and all non-JS/CSS files (this will include all image assets automatically)
    //  from 'resources/assets' folders including your Laravel packages:
    // TODO: DRY !!!
    var defaultAssets = defaultAssetPaths
      .map(function(assetPath) {
        // Convert current path to the relative path in the 'public/assets' of your Laravel application
        // E.G. '/var/www/my_laravel_app/resources/assets/js/backoffice/admin.js' path becomes 'backoffice/admin.js'
        var assetPathPattern = new RegExp('^(' + laravelRoot + '/|)(app|resources|(vendor|workbench)/[^/]+/[^/]+/(app|resources))/assets/[^/]+/(.+)$', 'i'); // Insensitive for Windows
        return assetPath.replace(assetPathPattern, '$5');
      }).filter(function(assetPath) {
        // Reject all JS/CSS files of 'resources/assets' folders including your Laravel packages
        var assetExt = path.extname(assetPath);
        return environment.extensions.indexOf(assetExt) === -1;
      }).concat(process.env.LARASSET_PRECOMPILE && process.env.LARASSET_PRECOMPILE.split('|'))
      .map(function(assetPath) {
        // Convert current path to the relative path in the 'public/assets' of your Laravel application
        // E.G. '/var/www/my_laravel_app/resources/assets/js/backoffice/admin.js' path becomes 'backoffice/admin.js'
        var assetPathPattern = new RegExp('^(' + laravelRoot + '/|)(app|lib|provider|resources|vendor|(vendor|workbench)/[^/]+/[^/]+/(app|lib|provider|resources|vendor))/assets/[^/]+/(.+)$', 'i'); // Insensitive for Windows
        return assetPath.replace(assetPathPattern, '$5');
      });

    // NOTICE: Source-maps files shouldn't be published on a public web server
    var enableSourceMaps = process.env.LARASSET_SOURCE_MAPS === 'false' ? false : true;
    if (!enableSourceMaps) {
      environment.disable('source_maps');
    }

    var assetsData = manifest.compile(defaultAssets, {
                                        compress: true, // Slowed pre-compilation, if your server compress your assets on the fly set it to false
                                        sourceMaps: enableSourceMaps,
                                        embedMappingComments: true
                                      });


    var manifestDigest = environment.getFileDigest(manifest.path);
    var manifestDirName = path.dirname(manifest.path);
    var manifestExt = path.extname(manifest.path);
    var manifestBaseName = path.basename(manifest.path, manifestExt);
    var manifestDigestPath = (manifestDirName + path.sep + manifestBaseName + '-' + manifestDigest + manifestExt);

    var globManifestFiles = (manifestDirName + path.sep + manifestBaseName + '-*' + manifestExt);
    glob(globManifestFiles, function(err, files) {
      if (err) {
        console.error('Failed to find old manifest files: ' + (err.message || err.toString()));
      }

      // Remove old manifest files:
      files.forEach(function(file) {
        fs.unlink(file);
      });

      // Rename 'manifest.json' with its hash value; E.g. 'manifest-ab161bb9c237a51587d5c4f7743346dd.json'
      fs.renameSync(manifest.path, manifestDigestPath);
    });

    console.info('\n\nAssets were successfully compiled.\n' +
                 'Manifest data (a proper JSON) was written to:\n' +
                 manifestDigestPath + '\n\n');
  } catch (err) {
    console.error('Failed compile assets: ' + (err.message || err.toString()));
  }
});
