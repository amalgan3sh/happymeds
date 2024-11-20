<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4">

    <div class="max-w-4xl mx-auto bg-white border border-gray-300">
        <div class="bg-green-500 text-white text-center py-2">
            <h1 class="text-lg font-bold">Product Requirement</h1>
        </div>
        <div class="p-4">
        <div class="flex justify-between">
    <div class="w-2/3">
        <p class="font-bold"><?= $distributor['company_name'] ?? $distributor['user_name'] ?></p>
        <p><?= $distributor['address'] ?? 'Address not available' ?></p>
        <p><span class="font-bold">Contact Person :</span> <?= $distributor['contact_person'] ?? $distributor['user_name'] ?>, 
           <span class="font-bold">Phone :</span> <?= $distributor['phone'] ?? 'N/A' ?></p>
        <p><span class="font-bold">Email :</span> <?= $distributor['email'] ?? 'N/A' ?></p>
        <p><span class="font-bold">H/P :</span> <?= $distributor['phone'] ?? 'N/A' ?></p>
    </div>
    <div class="w-1/3 text-right">
        <img alt="<?= $distributor['company_name'] ?? 'Company Logo' ?>" class="inline-block" height="100" 
             src="<?= $distributor['logo_url'] ?? 'default_logo_url.jpg' ?>" width="100">
        <p class="mt-2"><span class="font-bold">Date :</span> <?= date('Y-m-d H:i') ?></p>
        <p><span class="font-bold">PR :</span> <?= $order['product_requirement'] ?? 'Requirement details' ?></p>
    </div>
</div>
<div class="mt-4">
    <p class="font-bold">To :</p>
    <p><?= $manufacturer['company_name'] ?? 'Manufacturer Name' ?></p>
    <p><?= $manufacturer['address'] ?? 'Address not available' ?></p>
    <p><?= $manufacturer['email'] ?? 'Email not available' ?></p>
    <p><span class="font-bold">No. :</span> <?= $manufacturer['contact_number'] ?? 'N/A' ?></p>
    <p><span class="font-bold">GST :</span> <?= $manufacturer['gst_number'] ?? 'N/A' ?></p>
    <p><span class="font-bold">Drug Licence :</span> <?= $manufacturer['drug_license'] ?? 'N/A' ?></p>
    <p><span class="font-bold">FSSAI NO. :</span> <?= $manufacturer['fssai_no'] ?? 'N/A' ?></p>
</div>
            <div class="mt-4 border-t border-gray-300">
            <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Order Items</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Status Description</th>
                <th>Manufacturer ID</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
    <?php if (!empty($order)) : ?>
        <tr>
            <td><?= esc($order['order_id']) ?></td>
            <td><?= esc($order['user_id']) ?></td>

            <!-- Decode the JSON string in order_items -->
            <?php 
                $orderItems = json_decode($order['order_items'], true);
                $totalPrice = 0; // Initialize total price variable
            ?>
            <td>
                <?php if (!empty($orderItems)) : ?>
                    <ul>
                        <?php foreach ($orderItems as $item) : ?>
                            <li>
                                Product Name: <?= esc($item['ProductName']) ?><br>
                                Dosage Form: <?= esc($item['DosageForm']) ?><br>
                                Quantity: <?= esc($item['quantity']) ?><br>
                                Price: <?= esc($item['price']) ?>
                            </li>
                            <?php 
                                // Calculate the total price
                                $totalPrice += ($item['price'] * $item['quantity']); 
                            ?>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    No items found.
                <?php endif; ?>
            </td>

            <td><?= esc(number_format($totalPrice, 2)) ?></td> <!-- Display calculated total price -->
            <td><?= esc($order['status']) ?></td>
            <td><?= esc($order['status_description']) ?></td>
            <td><?= esc($order['manufacturer_id']) ?></td>
            <td><?= esc($order['created_at']) ?></td>
        </tr>
    <?php else : ?>
        <tr>
            <td colspan="8">No orders found.</td>
        </tr>
    <?php endif; ?>
</tbody>
    </table>
            </div>
            <div class="mt-4 border-t border-gray-300">
                <p class="font-bold mt-2">Terms & Condition</p>
                <p>iconic</p>
            </div>
            <div class="mt-4 border-t border-gray-300">
    <p class="font-bold mt-2">Terms & Condition</p>
    <p>iconic</p>
</div>
<div class="mt-4 border-t border-gray-300">
    <table class="w-full text-left mt-2">
        <tbody>
            <tr>
                <td class="border border-gray-300 p-2 font-bold">Total Price :</td>
                <td class="border border-gray-300 p-2"><?= esc(number_format($totalPrice, 2)) ?></td>
            </tr>
            <tr>
                <td class="border border-gray-300 p-2 font-bold">In words</td>
                <td class="border border-gray-300 p-2">
                    <?= ucfirst(number_to_words($totalPrice)) ?> dollars
                </td>
            </tr>
        </tbody>
    </table>
</div>
        </div>
    </div>
</body>
</html>