# Products - Mini MVC Example

Repositorio mínimo con Modelo, Vista y Controlador para gestionar productos y una "tabla de Excel" (CSV).

Contenido
`src/Model/Product.php` — modelo que lee y escribe en `data/products.csv`.
- `src/Controller/ProductsController.php` — controlador con `index()` y `store()`.
- `views/index.php` — vista que muestra la tabla y un formulario rápido para agregar productos.
- `public/index.php` — front controller para ejecutar el ejemplo.
- `data/products.csv` — tabla en formato CSV (compatible con Excel).

Objetivo
Este repositorio es una versión sencilla y autocontenida 
Cómo usar
1. Desde la carpeta `products-github`, inicia el servidor PHP embebido:
powershell
cd products-github
php -S 127.0.0.1:8001 -t public

2. Abre en tu navegador: `http://127.0.0.1:8001/` — verás la lista de productos.
3. Usa el formulario para agregar productos; se almacenarán en `data/products.csv`.





git init
git add .
git commit -m "Inicial: MVC minimal con CSV"
# crea un repo remoto en GitHub y luego:
# git remote add origin https://github.com/tuusuario/tu-repo.git
# git push -u origin main
```

Notas
- Esto es una demo educativa; en un proyecto real usarías una base de datos y validaciones más robust

