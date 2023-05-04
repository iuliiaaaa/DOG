<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/app/config/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/app/helpers/Connection.php';

include $_SERVER['DOCUMENT_ROOT'] . '/app/models/Category.php';
include $_SERVER['DOCUMENT_ROOT'] . '/app/models/Client.php';
include $_SERVER['DOCUMENT_ROOT'] . '/app/models/Breed.php';
include $_SERVER['DOCUMENT_ROOT'] . '/app/models/Status.php';
include $_SERVER['DOCUMENT_ROOT'] . '/app/models/Service.php';
include $_SERVER['DOCUMENT_ROOT'] . '/app/models/Worker.php';
include $_SERVER['DOCUMENT_ROOT'] . '/app/models/Pet.php';
include $_SERVER['DOCUMENT_ROOT'] . '/app/models/Application.php';