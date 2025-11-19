<?php

namespace App\Model;

class Product
{
    protected static function csvPath(): string
    {
        return __DIR__ . '/../../data/products.csv';
    }

    public static function all(): array
    {
        $file = self::csvPath();
        if (!file_exists($file)) {
            return [];
        }

        $rows = array_map('str_getcsv', file($file));
        if (count($rows) < 1) return [];
        $header = array_map('trim', $rows[0]);
        $data = [];
        for ($i = 1; $i < count($rows); $i++) {
            $row = $rows[$i];
            if (count($row) < 1) continue;
            $item = [];
            foreach ($header as $j => $col) {
                $item[$col] = $row[$j] ?? null;
            }
            $data[] = $item;
        }
        return $data;
    }

    public static function create(array $attrs): bool
    {
        $file = self::csvPath();
        $exists = file_exists($file);
        $fp = fopen($file, 'a');
        if (!$exists) {
            // write header
            fputcsv($fp, ['id','name','price','stock','description']);
        }
        // generate id
        $all = self::all();
        $lastId = 0;
        foreach ($all as $row) {
            $id = isset($row['id']) ? (int)$row['id'] : 0;
            if ($id > $lastId) $lastId = $id;
        }
        $newId = $lastId + 1;

        $row = [
            $newId,
            $attrs['name'] ?? '',
            isset($attrs['price']) ? number_format((float)$attrs['price'],2,'.','') : '0.00',
            $attrs['stock'] ?? 0,
            $attrs['description'] ?? '',
        ];
        $ok = fputcsv($fp, $row) !== false;
        fclose($fp);
        return $ok;
    }
}
