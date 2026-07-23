<?php
$products = [
  1 => ["name" => "Women's Light Green Chanderi Suit Set", "price" => "$24.99", "image" => "images/shopping (1).webp"],
  2 => ["name" => "Women's Red Designer Suit", "price" => "$29.99", "image" => "images/red_suit.jpg"],
  3 => ["name" => "Women's Blue Cotton Suit", "price" => "$14.99", "image" => "images/shopping (3).webp"],
  4 => ["name" => "Women's Yellow Silk Suit", "price" => "$114.99", "image" => "images/shopping (2).webp"],
  5 => ["name" => "Women's Baby Pink Anarkali Dress", "price" => "$54.99", "image" => "images/baby_pink.jpg"],
  6 => ["name" => "Women's Black Long Gown", "price" => "$74.99", "image" => "images/black.jpg"],
  7 => ["name" => "Women's Yellow Cotton Dress", "price" => "$34.99", "image" => "images/shopping (3).webp"],
  8 => ["name" => "Women's Designer Silk Suit Set", "price" => "$84.99", "image" => "images/2.avif"]
];

$id = $_GET['id'] ?? 1;
$product = $products[$id];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Item Added to Cart</title>
  <style>
    body { font-family: Arial, sans-serif; text-align: center; margin: 50px; }
    h1 { font-size: 32px; font-weight: bold; margin-bottom: 30px; }
    img { width: 250px; height: auto; border