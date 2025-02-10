<?php

use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Contact; // Assuming you have a Contact model
use Illuminate\Support\Facades\Session;

uses(WithFaker::class);

it("store test", function () {

    Session::start();

    $contactData = [
        'account_id' => 1,
        'organization_id' => 1,
        'first_name' => $this->faker->firstName,
        'last_name' => $this->faker->lastName,
        'email' => $this->faker->email,
        'phone' => $this->faker->e164PhoneNumber,
        'address' => '1 Test Street',
        'city' => 'Testerfield',
        'region' => 'Debbyshire',
        'country' => $this->faker->randomElement(['US', 'CA']),
        'postal_code' => $this->faker->postcode,
    ];

    //create a record
    $contact = Contact::create($contactData);

    // Assert that the contact is present in the database
    $this->assertDatabaseHas('contacts', [
    'email' => $contactData['email'],
    'phone' => $contactData['phone'],
    'address' => $contactData['address'],
    ]);

    //assert that the email passed, same as saved.
    $this->assertSame($contactData['email'], $contact->email);
});
