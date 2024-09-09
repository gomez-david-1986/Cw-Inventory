<?php

namespace classes;

class Item
{

    private int $item_id;
    private ?string $product_name;
    private ?string $description;
    private ?string $category;
    private ?string $manufacturer;
    private ?string $purchase_date;
    private ?string $expiration_date;
    private ?string $location;
    private ?string $barcode;
    private ?string $serial_number;
    private ?float $purchase_price;
    private int $active;
    private int $available;
    private int $loanable;
    private string $status;


    public function setData(array $ResultSet): void
    {

        $this->item_id = $ResultSet["item_id"];
        $this->product_name = strtoupper($ResultSet["product_name"] ?? "");
        $this->description = strtoupper($ResultSet["description"] ?? "");
        $this->category = strtoupper($ResultSet["category"] ?? "");
        $this->manufacturer = strtoupper($ResultSet["manufacturer"] ?? "");
        $this->purchase_date = strtoupper($ResultSet["purchase_date"] ?? "");
        $this->expiration_date = strtoupper($ResultSet["expiration_date"] ?? "");
        $this->location = strtoupper($ResultSet["location"] ?? "");
        $this->barcode = strtoupper($ResultSet["barcode"] ?? "");
        $this->serial_number = strtoupper($ResultSet["serial_number"] ?? "");
        $this->status = strtoupper($ResultSet["status"] ?? "");
        $this->purchase_price = $ResultSet["purchase_price"] ?? 0;
        $this->active = $ResultSet["active"] ?? 0;
        $this->available = $ResultSet["available"] ?? 0;
        $this->loanable = $ResultSet["loanable"] ?? 0;

    }

    public function getItemId(): ?int
    {
        return $this->item_id;
    }

    public function setItemId(?int $item_id): void
    {
        $this->item_id = $item_id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(?string $product_name): void
    {
        $this->product_name = $product_name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): void
    {
        $this->category = $category;
    }

    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(?string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    public function getPurchaseDate(): ?string
    {
        return $this->purchase_date;
    }

    public function setPurchaseDate(?string $purchase_date): void
    {
        $this->purchase_date = $purchase_date;
    }

    public function getExpirationDate(): ?string
    {
        return $this->expiration_date;
    }

    public function setExpirationDate(?string $expiration_date): void
    {
        $this->expiration_date = $expiration_date;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(?string $barcode): void
    {
        $this->barcode = $barcode;
    }

    public function getSerialNumber(): ?string
    {
        return $this->serial_number;
    }

    public function setSerialNumber(?string $serial_number): void
    {
        $this->serial_number = $serial_number;
    }

    public function getPurchasePrice(): ?float
    {
        return $this->purchase_price;
    }

    public function setPurchasePrice(?float $purchase_price): void
    {
        $this->purchase_price = $purchase_price;
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function setActive(int $active): void
    {
        $this->active = $active;
    }

    public function getAvailable(): int
    {
        return $this->available;
    }

    public function setAvailable(int $available): void
    {
        $this->available = $available;
    }

    public function getLoanable(): int
    {
        return $this->loanable;
    }

    public function setLoanable(int $loanable): void
    {
        $this->loanable = $loanable;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

}