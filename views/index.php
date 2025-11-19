<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$success = $_SESSION['success'] ?? null;
unset($_SESSION['success']);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Productos - lista</title>
    <style>body{font-family:Arial,Helvetica,sans-serif;padding:18px}table{width:100%;border-collapse:collapse}th,td{border:1px solid #ddd;padding:8px}th{background:#f4f4f4}</style>
</head>
<body>
    <h1>Lista de Productos</h1>

    <?php if ($success): ?>
        <div style="padding:10px;background:#d4edda;color:#155724;margin-bottom:16px;border:1px solid #c3e6cb;">
            <?= htmlspecialchars($success) ?>
        </div>
    <?php endif; ?>

    <div style="margin-bottom:16px;">
        <form action="/products" method="POST" style="display:flex;gap:8px;align-items:flex-end;flex-wrap:wrap;">
            <div style="display:flex;flex-direction:column;">
                <label for="name">Nombre</label>
                <input id="name" name="name" type="text" required style="padding:6px;min-width:180px;" />
            </div>
            <div style="display:flex;flex-direction:column;">
                <label for="price">Precio</label>
                <input id="price" name="price" type="number" step="0.01" required style="padding:6px;min-width:120px;" />
            </div>
            <div style="display:flex;flex-direction:column;">
                <label for="stock">Stock</label>
                <input id="stock" name="stock" type="number" min="0" value="0" style="padding:6px;min-width:80px;" />
            </div>
            <div style="display:flex;flex-direction:column;flex:1;min-width:220px;">
                <label for="description">Descripción</label>
                <input id="description" name="description" type="text" style="padding:6px;" />
            </div>
            <div>
                <button type="submit" style="padding:8px 12px;background:#007bff;color:#fff;border:none;cursor:pointer;">Agregar</button>
            </div>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($products)): ?>
                <?php foreach($products as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($p['name'] ?? '') ?></td>
                        <td>$<?= htmlspecialchars($p['price'] ?? '') ?></td>
                        <td><?= htmlspecialchars($p['stock'] ?? '') ?></td>
                        <td><?= htmlspecialchars($p['description'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" style="text-align:center;color:#666">No hay productos</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
