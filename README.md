# Hub
Laravel implementation of hub.

This app has the goal to become a webframe server for Forms and a service to provide information via json, xml and rss 

## Models

Each model SHOULD have id and description Accessors
Each model MUST implement HubModel instead of Model

## Views

Each view MUST be written in JADE and compiled withb `gulp`

## SASS and Coffee

Libraries are direcly committed in the public folder
Hub related stuff are located in the resource directory and compiled via `gulp`


