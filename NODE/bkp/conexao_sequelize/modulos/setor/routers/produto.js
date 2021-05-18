'use strict'

const express = require('express')
const router = express.Router()

const controller = require('../controller/Produto')

router.get('/listProduto', controller.read)
router.post('/saveProduto', controller.insert)
router.post('/updateProduto', controller.update)
router.post('/deleteProduto', controller.delete)

module.exports = router
