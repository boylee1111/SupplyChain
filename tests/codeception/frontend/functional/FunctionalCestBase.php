<?php

namespace tests\codeception\frontend\functional;

class FunctionalCestBase
{
    /**
     * This method is called before each cest class test method
     * @param \Codeception\Event\TestEvent $event
     */
    public function _before($event)
    {
    }

    /**
     * This method is called after each cest class test method, even if test failed.
     * @param \Codeception\Event\TestEvent $event
     */
    public function _after($event)
    {
    }

    /**
     * This method is called when test fails.
     * @param \Codeception\Event\FailEvent $event
     */
    public function _fail($event)
    {
    }

    protected function fakeClient()
    {
        $fakeClient = new Client();
        $fakeClient->serial_number = "C241874";
        $fakeClient->primary_name = "Fake Client";
        $fakeClient->client_type_id = $this->fakeClientType()->client_type_id;
        $fakeClient->save();
        return $fakeClient;
    }

    protected function fakeClientType()
    {
        $fakeClientType = new ClientType();
        $fakeClientType->client_type_name = "Fake Client Type";
        $fakeClientType->save();
        return $fakeClientType;
    }

    protected function fakeCurrency()
    {
        $fakeCurrency = new Currency();
        $fakeCurrency->currency_code = "USD";
        $fakeCurrency->currency_name = "Dollar";
        $fakeCurrency->save();
        return $fakeCurrency;
    }

    protected function fakeDepot()
    {
        $fakeDepot = new Depot();
        $fakeDepot->serial_number = "FK287424";
        $fakeDepot->name = "Fake Depot";
        $fakeDepot->save();
        return $fakeDepot;
    }

    protected function fakeDepot2()
    {
        $fakeDepot = new Depot();
        $fakeDepot->serial_number = "FK287425";
        $fakeDepot->name = "Fake Depot 2";
        $fakeDepot->save();
        return $fakeDepot;
    }

    protected function fakeFactoryType()
    {
        $fakeFactoryType = new FactoryType();
        $fakeFactoryType->factory_type_name = "Fake Factory";
        $fakeFactoryType->save();
        return $fakeFactoryType;
    }

    protected function fakeProduct()
    {
        $fakeProduct = new Product();
        $fakeProduct->serial_number = "P1284724";
        $fakeProduct->primary_name = "Fake Product";
        $fakeProduct->product_type_id = $this->fakeProductType()->product_type_id;
        $fakeProduct->currency_id = $this->fakeCurrency()->currency_id;
        $fakeProduct->client_id = $this->fakeClient()->client_id;
        $fakeProduct->supplier_id = $this->fakeSupplier()->supplier_id;
        $fakeProduct->save();
        return $fakeProduct;
    }

    protected function fakeProductType()
    {
        $fakeProductType = new ProductType();
        $fakeProductType->product_type_name = "Fake Product Type";
        $fakeProductType->save();
        return $fakeProductType;
    }

    protected function fakeRoadSectionType()
    {
        $fakeRoadSectionType = new RoadSectionType();
        $fakeRoadSectionType->road_section_type_name = "Fake Road Section Type";
        $fakeRoadSectionType->save();
        return $fakeRoadSectionType;
    }

    protected function fakeStationType()
    {
        $fakeStationType = new StationType();
        $fakeStationType->station_type_name = "Fake Station";
        $fakeStationType->save();
        return $fakeStationType;
    }

    protected function fakeSupplier()
    {
        $fakeSupplier = new Supplier();
        $fakeSupplier->serial_number = "S2819742";
        $fakeSupplier->primary_name = "Fake Supplier";
        $fakeSupplier->supplier_type_id = $this->fakeSupplierType()->supplier_type_id;
        return $fakeSupplier;
    }

    protected function fakeSupplierType()
    {
        $fakeSupplierType = new SupplierType();
        $fakeSupplierType->supplier_type_name = "Fake Supplier Type";
        $fakeSupplierType->save();
        return $fakeSupplierType;
    }

    protected function fakeUser()
    {
        $fakeUser = new User();
        $fakeUser->username = 'User';
        $fakeUser->auth_key = 'j019j90fmu902c';
        $fakeUser->password_hash = 'ajs192f01fjjf';
        $fakeUser->email = 'user@maitrox.com';
        $fakeUser->save();
        return $fakeUser;
    }

    protected function fakeVendor()
    {
        $fakeVendor = new Vendor();
        $fakeVendor->serial_number = "V284724";
        $fakeVendor->primary_name = "Fake Vendor";
        $fakeVendor->vendor_type_id = $this->fakeVendorType()->vendor_type_id;
        $fakeVendor->save();
        return $fakeVendor;
    }

    protected function fakeVendorType()
    {
        $fakeVendorType = new VendorType();
        $fakeVendorType->vendor_type_name = "Fake Vendor Type";
        $fakeVendorType->save();
        return $fakeVendorType;
    }

    protected function fakeWarehouseType()
    {
        $fakeWarehouseType = new WarehouseType();
        $fakeWarehouseType->warehouse_type_name = "Fake Warehouse Type";
        $fakeWarehouseType->save();
        return $fakeWarehouseType;
    }
}
