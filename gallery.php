<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Gallery - Myntra</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    .gallery {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin-top: 30px;
    }
    .gallery img {
      width: 200px;
      height: 250px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.2);
      transition: transform 0.3s;
    }
    .gallery img:hover {
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <h1>Gallery</h1>
  <p>Explore our latest collection of suits, dresses, and accessories.</p>

  <div class="gallery">
    <img src="images/yellowsuit.webp" alt="Stylish Suit">
    <img src="images/red_suit1.jpg" alt="Elegant Dress">
    <img src="images/greensuitt.webp" alt="Trendy Accessory">
    <img src="images/suittt.jpg" alt="Fashion Shoes">
     <img src="images/r1-scaled-1.jpg.webp" alt="Stylish Suit">
    <img src="images/puple_suit2.webp" alt="Elegant Dress">
    <img src="images/green - Copy.avif" alt="Trendy Accessory">
    <img src="images/shopping (2).webp" alt="Fashion Shoes">
    <img src="images/shopping.webp" alt="Stylish Suit">
    <img src="images/white4.webp" alt="Elegant Dress">
    <img src="images/yellow dress.webp" alt="Trendy Accessory">
    <img src="images/suit.webp" alt="Fashion Shoes">
    <img src="images/shopping (5).webp" alt="Stylish Suit">
    <img src="images/shopping (6).webp" alt="Elegant Dress">
    <img src="images/shopping (4).webp" alt="Trendy Accessory">
    <img src="images/punjabi-suit-for-women-9.jpg" alt="Fashion Shoes">


  </div>
</body>
</html>
