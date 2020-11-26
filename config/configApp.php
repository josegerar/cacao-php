<?php
const SERVER = "localhost";
const BD = "cacao";
const USER = "postgres";
const PASSWORD = "123456";
const PORT = 5432;
//const SGBD = "mysql:host=" . SERVER . ";dbname=" . BD;
const SGBD = "pgsql:host=" . SERVER . ";port=" . PORT . ";dbname=" . BD;
const SECRET_KEY = "XCCVSC8112W381((·($";#se puede cambiar cualquier caracter
const SECRET_IV = '6878874356';#se puede cambiar solo numero
const METHOD = 'AES-256-CBC';
