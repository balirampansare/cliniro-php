var url = 'https://newsapi.org/v2/top-headlines?' +
          'country=us&' +
          'apiKey=14752f907dba4fa09868548074054773';
var req = new Request(url);
fetch(req)
    .then(function(response) {
        console.log(response.json());
    })