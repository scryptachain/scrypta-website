const express = require('express')
const app = express()
const port = 3000
app.use(express.static('public'))
const fs = require('fs')

let routes = {
    '/': 'index.html',
    '/scrypta-blockchain': 'blockchain.html',
    '/dapps': 'dapps.html',
    '/developers': 'developers.html',
    '/en': 'en/index.html',
    '/en/scrypta-blockchain': 'en/blockchain.html',
    '/en/dapps': 'en/dapps.html',
    '/en/developers': 'en/developers.html',
}

for(let k in routes){
    app.get(k, (req, res) => {
        fs.readFile('public/' + routes[k], {encoding: 'utf-8'}, function(err,data){
            res.send(data)
        })
    })
}

app.listen(port, () => console.log(`Testing server running at http://localhost:${port}`))