<?
// Удаляем сессию
session_destroy();

// редиректим на страницу с входом
header('location: /login');

?>