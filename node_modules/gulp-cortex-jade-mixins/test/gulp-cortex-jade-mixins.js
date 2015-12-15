'use strict';

var expect = require('chai').expect;
var mixins = require('../');

var jade = require('jade');
var path = require('path');

describe('jade', function () {
  it('should be ok',function(){
    var html = jade.renderFile(path.join(__dirname,'fixtures/test.jade'));
    var expected = '{{{facade "a"}}}<link type="text/css" rel="stylesheet" href="{{{static "a"}}}"/>{{{static "a"}}}';
    expect(html).to.equal(expected);
  });
});