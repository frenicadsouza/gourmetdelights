var http = require('http');
var fs = require('fs');
http.createServer(function (req, res) {
    fs.readFile('HomePage.html', function(err, data) {
        res.writeHead(200, { 'Content-Type': 'text/html' });
        res.write(data);
        // read Json file.
        let readData = fs.readFileSync('recipes.json');
        let recipessObj = JSON.parse(readData);
        let recipesStr = JSON.stringify(recipesObj); 
        res.write("<script>processResult('" + recipesStr +"');</script>");

    return res.end();
  });
}).listen(3333);
//this is to connect the html file and recipes.json