<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./css/halproduk.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-left">
                <a href="homepage.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                        <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
                        <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/>
                    </svg>
                </a>
                <p>Ketuk untuk kembali</p>
            </div>
        </div>
    </header>
    
    <main>
        <section class="product-section">
            <div class="container">
                <div class="product-details">
                    <div class="product-image">
                        <img src="../aset/Aset Gambar/rotisisir.jpg" alt="Product Image">
                    </div>
                    <div class="product-info">
                        <h2>ROTI Ngawi</h2>
                        <div class="rating">
                            ★★★★★
                            <span>(19 reviews)</span>
                        </div>
                        <ul class="product-features">
                            <li>10g of Lactose-Free Whey Protein</li>
                            <li>5g of Healthy Fats</li>
                            <li>1g of Carbs</li>
                            <li>Sweetened by Monk Fruit</li>
                            <li>No Cane Sugar, Sugar Alcohols, or Sugar Substitutes</li>
                            <li>200mg of caffeine - all day energy without the crash</li>
                        </ul>
                        <div class="price">
                            40.000
                        </div>
                        <p class="shipping-info">Shipping will be calculated at checkout</p>
                        <div class="purchase-options">
                            <label for="one-time-purchase">
                                <input type="radio" id="one-time-purchase" name="purchase-option">
                                ONE TIME PURCHASE - 40.000
                            </label>
                            <label for="subscribe-and-save">
                                <input type="radio" id="subscribe-and-save" name="purchase-option">
                                SUBSCRIBE & SAVE (15%) - 36.000
                                <a href="#" class="subscription-details">Subscription details</a>
                            </label>
                        </div>
                        <div class="quantity-control">
                            <label for="quantity">Quantity</label>
                            <div class="quantity">
                                <button class="minus">-</button>
                                <input type="number" id="quantity" value="1" min="1">
                                <button class="plus">+</button>
                            </div>
                        </div>
                        <button class="add-to-cart">Tambahkan ke keranjang</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="benefits-section">
            <div class="container">
                <h2>BENEFITS</h2>
                <div class="benefits">
                    <div class="benefit">
                        <img src="keto-icon.png" alt="Uno">
                        <h3>Mantap</h3>
                    </div>
                    <div class="benefit">
                        <img src="mct-oil-icon.png" alt="Dos">
                        <h3>Enak</h3>
                    </div>
                    <div class="benefit">
                        <img src="lactose-free-icon.png" alt="Tres">
                        <h3>Nikmat</h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="benefits-section">
    <div class="container">
        <h2>BENEFITS</h2>
        <div class="benefits">
            <div class="benefit">
                <img src="keto-icon.png" alt="Uno">
                <h3>Mantap</h3>
            </div>
            <div class="benefit">
                <img src="mct-oil-icon.png" alt="Dos">
                <h3>Enak</h3>
            </div>
            <div class="benefit">
                <img src="lactose-free-icon.png" alt="Tres">
                <h3>Nikmat</h3>
            </div>
        </div>

        <!-- Bagian Komentar -->
        <div class="comments-section">
            <h3>Comments</h3>
            <ul class="comments-list">
                <li>
                    <span class="comment-author">John Doe:</span>
                    <span class="comment-text">Great product! Helped me stay energized throughout the day.</span>
                </li>
                <li>
                    <span class="comment-author">Jane Smith:</span>
                    <span class="comment-text">Delicious and filling, highly recommend!</span>
                </li>
            </ul>
            <div class="comment-form">
                <h4>Add a Comment</h4>
                <textarea placeholder="Write your comment here..."></textarea>
                <button type="button" class="submit-comment">Submit</button>
            </div>
        </div>
    </div>
</section>

    </main>
</body>
</html>