<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan</title>
    <link rel="stylesheet" href="style/pesan.css">
</head>
<body>
    <div class="background">
        <header>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Pemesanan</a></li>
                </ul>
            </nav>
        </header>
        <div class="container">
            <h1>Pesan</h1>
            <div class="content">
                <!-- Detail Pelanggan -->
                <div class="customer-details">
                    <h2>Detail Pelanggan</h2>
                    <form id="orderForm" action="pesan_checkout.php" method="POST">
                        <label for="nama-pelanggan">Nama Pelanggan</label>
                        <input type="text" id="nama-pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan" required>

                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" placeholder="Alamat" required>

                        <label for="metode-pembayaran">Metode Pembayaran</label>
                        <select id="metode-pembayaran" name="metode_pembayaran" required>
                            <option value="">Pilih Metode</option>
                            <option value="cash">Cash</option>
                            <option value="credit">Kartu Kredit</option>
                            <option value="debit">Debit</option>
                        </select>

                        <h3>Pemesanan</h3>
                        <div id="order-summary">
                            <!-- Pesanan akan ditampilkan di sini -->
                        </div>
                        <p><strong>Total:</strong> <span id="total-price">Rp0</span></p>

                        <input type="hidden" id="order-items" name="order_items">
                        <input type="hidden" id="total-price-input" name="total_price">

                        <button type="submit" class="btn btn-lanjut">Lanjut</button>
                    </form>
                </div>

                <!-- Daftar Menu -->
                <div class="menu">
                    <div class="search-bar">
                        <input type="text" id="search-input" placeholder="Masukkan nama makanan">
                        <button onclick="searchMenu()">🔍</button>
                    </div>
                    <div class="menu-list" id="menu-list">
                        <div class="menu-item">
                            <img src="style/Assets/menu1.png" alt="Provencal Roast Chicken">
                            <p>Provencal Roast Chicken</p>
                            <p>Rp40.000,00</p>
                            <button onclick="addToOrder('Provencal Roast Chicken', 40000)">Pesan</button>
                        </div>
                        <div class="menu-item">
                            <img src="style/Assets/menu2.png" alt="Virgin Green Mojito">
                            <p>Virgin Green Mojito</p>
                            <p>Rp40.000,00</p>
                            <button onclick="addToOrder('Virgin Green Mojito', 40000)">Pesan</button>
                        </div>
                        <div class="menu-item">
                            <img src="style/Assets/menu3.png" alt="Tuna Tomato Sauce">
                            <p>Tuna Tomato Sauce</p>
                            <p>Rp140.000,00</p>
                            <button onclick="addToOrder('Tuna Tomato Sauce', 140000)">Pesan</button>
                        </div>
                        <div class="menu-item">
                            <img src="style/Assets/menu4.png" alt="Lobster Garlic Sauce">
                            <p>Lobster Garlic Sauce</p>
                            <p>Rp400.000,00</p>
                            <button onclick="addToOrder('Lobster Garlic Sauce', 400000)">Pesan</button>
                        </div>
                    </div>
                    <div class="shuffle">
                        <button onclick="shuffleMenu()">Shuffle Menu</button>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <p>© 2024 CakePHP GROUP. Hak cipta dilindungi undang-undang.</p>
            <p>Contact Us: spikoeresto@gmail.com | +62852-5664-1111</p>
        </footer>
    </div>

    <script>
        let orderItems = [];
        let totalPrice = 0;

        function addToOrder(itemName, price) {
            orderItems.push({ name: itemName, price: price });
            totalPrice += price;
            updateOrderSummary();
        }

        function updateOrderSummary() {
            const orderSummary = document.getElementById('order-summary');
            const totalPriceElement = document.getElementById('total-price');
            const orderItemsInput = document.getElementById('order-items');
            const totalPriceInput = document.getElementById('total-price-input');

            orderSummary.innerHTML = '';
            orderItems.forEach(item => {
                orderSummary.innerHTML += `<p>${item.name} 1x Rp${item.price.toLocaleString()}</p>`;
            });

            totalPriceElement.textContent = `Rp${totalPrice.toLocaleString()}`;
            orderItemsInput.value = JSON.stringify(orderItems);
            totalPriceInput.value = totalPrice;
        }

        function searchMenu() {
            const searchInput = document.getElementById('search-input').value.toLowerCase();
            const menuItems = document.querySelectorAll('.menu-item');

            menuItems.forEach(item => {
                const itemName = item.querySelector('p').textContent.toLowerCase();
                if (itemName.includes(searchInput)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        function shuffleMenu() {
            const menuList = document.getElementById('menu-list');
            for (let i = menuList.children.length; i >= 0; i--) {
                menuList.appendChild(menuList.children[Math.random() * i | 0]);
            }
        }
    </script>
</body>
</html>