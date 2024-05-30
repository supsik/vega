<?php

namespace App\Medods;

use App\Medods\Exceptions\MedodsException;
use App\Medods\Resources\AppointmentResource;
use App\Medods\Resources\ClientResource;
use App\Medods\Resources\EntryResource;
use App\Medods\Resources\EntryTypeResource;
use App\Medods\Resources\ScheduleResource;
use App\Medods\Resources\UserResource;

class Medods
{
    private ?ClientResource $client = null;
    private ?UserResource $user = null;
    private ?AppointmentResource $appointment = null;
    private ?EntryTypeResource $entryType = null;
    private ?EntryResource $entry = null;
    private ?ScheduleResource $schedule = null;

    public function __construct()
    {
        //
    }

    public function client(): ?ClientResource
    {
        if (is_null($this->client)) {
            $this->client = new ClientResource();
        }

        return $this->client;
    }

    public function user(): ?UserResource
    {
        if (is_null($this->user)) {
            $this->user = new UserResource();
        }

        return $this->user;
    }

    public function appointment(): ?AppointmentResource
    {
        if (is_null($this->appointment)) {
            $this->appointment = new AppointmentResource();
        }

        return $this->appointment;
    }

    public function entryType(): ?EntryTypeResource
    {
        if (is_null($this->entryType)) {
            $this->entryType = new EntryTypeResource();
        }

        return $this->entryType;
    }

    public function entry(): ?EntryResource
    {
        if (is_null($this->entry)) {
            $this->entry = new EntryResource();
        }

        return $this->entry;
    }

    public function schedule(): ?ScheduleResource
    {
        if (is_null($this->schedule)) {
            $this->schedule = new ScheduleResource();
        }

        return $this->schedule;
    }

    /**
     * @throws MedodsException
     */
    public function __call(string $name, array $params): void
    {
        throw new MedodsException(
            [
                'message' => 'The specified resource does not exist',
                'code' => 404,
                'reason' => 'Resource not found',
            ]
        );
    }
}

