'use strict'

const express = require('express')
const bodyParser = require('body-parser')
const path = require('path')
const app = express()
const port = process.env.PORT || 3000

app.use(bodyParser.urlencoded({extended: false}))
app.use(bodyParser.json())

app.get('/FPGA', (req, res)=>{
    var datos = req.body;
    res.send('prueba de server');
    res.send(datos.data);
})


app.post('/FPGA', (req, res)=>{
    var datos = req.body;
    console.log(datos.data);
    res.send('prueba sdfsfsdf');
    //res.sendStatus(200);
    res.send(datos.data);
})
app.put('/FPGA', (req, res)=>{
    var status = req.body.data;
})

app.listen(port, ()=> {
    console.log(`Servicio corriendo en el puerto ${port}`)
})

// const datos = {test: 1};
// const response = await fetch("URL", {
//     method: 'POST',
//     headers: {
//     'Content-Type': 'application/json' // 'Content-Type': 'application/x-www-form-urlencoded',
//     },
//     body: JSON.stringify(data) // body data type must match "Content-Type" header
// });
// return response.json(); // parses JSON response into native JavaScript objects
// console.log(response)