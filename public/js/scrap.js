var casper = require('casper').create();
var fs = require('fs');
var utils = require('utils');
var url = "http://localhost:8000/admin/candidates/22";
var parsedEmails;
casper.start();

casper
  .then(function(){
    console.log("Start:");
  })

  .thenOpen(url)
  .then(function(){
    // scrape something
    this.echo(this.getHTML('html'));
  })
  .then(function(){
    fs.write('HTML.html', this.getHTML('html'), 'w');
  })
casper.run();
