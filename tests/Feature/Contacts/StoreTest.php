<?php

use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Contact; // Assuming you have a Contact model
use Illuminate\Support\Facades\Session;


it("store test", function () {

    Session::start();

    $contactData = [
        'account_id' => 1,
        'organization_id' => 1,
        'first_name' => \Pest\Faker\fake()->firstName,
        'last_name' => \Pest\Faker\fake()->lastName,
        'email' => \Pest\Faker\fake()->email,
        'phone' => \Pest\Faker\fake()->e164PhoneNumber,
        'address' => '1 Test Street',
        'city' => 'Testerfield',
        'region' => 'Derbyshire',
        'country' => \Pest\Faker\fake()->randomElement(['US', 'CA']),
        'postal_code' => \Pest\Faker\fake()->postcode,
    ];

    //create a record
    $contact = Contact::create($contactData);

    // Assert that the contact is present in the database
    $this->assertDatabaseHas('contacts', [
    'email' => $contactData['email'],
    'phone' => $contactData['phone'],
    'address' => $contactData['address'],
    ]);

    expect(Contact::latest()->first())
        ->first_name->toBeString()->not->toBeEmpty()
        ->last_name->toBeString()->not->toBeEmpty()
        ->email->toBeString()->toContain('@')
        ->phone->toBePhoneNumber()
        ->region->toBe('Derbyshire')
        ->country->toBeIn(['US', 'CA']);
});
