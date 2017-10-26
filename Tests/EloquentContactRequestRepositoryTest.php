<?php

namespace Modules\Contact\Tests;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Modules\Contact\Entities\ContactRequest;
use Modules\Contact\Events\ContactRequestWasCreated;
use Modules\Contact\Emails\ContactRequestNotification;

class EloquentContactRequestRepositoryTest extends BaseContactRequestTest
{
    /** @test */
    public function it_creates_a_contact_request()
    {
        Mail::fake();
        Event::fake();

        $this->contactRequest->create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'company' => 'John Doe LLC',
            'phone' => '123 456',
            'message' => 'Hello there!',
        ]);

        $contactRequest = $this->contactRequest->find(1);
        $this->assertCount(1, $this->contactRequest->all());
        $this->assertEquals('John Doe', $contactRequest->name);
        $this->assertEquals('john@doe.com', $contactRequest->email);
        $this->assertEquals('John Doe LLC', $contactRequest->company);
        $this->assertEquals('123 456', $contactRequest->phone);
        $this->assertEquals('Hello there!', $contactRequest->message);
    }

    /** @test */
    public function it_triggers_event_when_contact_request_was_created()
    {
        Mail::fake();
        Event::fake();

        $contactRequest = $this->createContactRequest();

        Event::assertDispatched(ContactRequestWasCreated::class, function ($e) use ($contactRequest) {
            return $e->contactRequest->id === $contactRequest->id;
        });
    }

    /** @test */
    public function it_sends_an_email_when_contact_request_was_created()
    {
        Mail::fake();

        $contactRequest = $this->createContactRequest();

        Mail::assertQueued(ContactRequestNotification::class, function (ContactRequestNotification $mail) use ($contactRequest) {
            return $mail->contactRequest->id === $contactRequest->id;
        });
    }

    /** @test */
    public function it_sends_email_with_correct_content()
    {
        $contactRequest = factory(ContactRequest::class)->make();
        $email = new ContactRequestNotification($contactRequest);
        $rendered = $this->render($email);

        $this->assertContains('Someone contacted you', $rendered);
    }

    private function createContactRequest()
    {
        $faker = \Faker\Factory::create();

        return $this->contactRequest->create([
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'company' => $faker->company,
            'phone' => $faker->phoneNumber,
            'message' => $faker->paragraph(10),
        ]);
    }

    private function render($email)
    {
        $email->build();

        return view($email->view, $email->buildViewData())->render();
    }
}
