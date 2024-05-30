@php
    $uniqId = uniqid('carousel');
@endphp

@if(count($this->currentSchedule['times']))

    <x-schedule>
        <x-schedule.title>{{ $title }}</x-schedule.title>

        <div class="schedule-carousel__nav">
            @foreach($schedule as $idx => $element)
                <button
                    class="schedule-carousel__nav-btn btn btn-dark btn-sm {{ $this->currentDayId === $idx ? 'active' : '' }}"
                    wire:click="setDayId({{ $idx }})" wire:key="$element['date']">
                    {{ __dayOfMonth($element['date']) }}
                </button>
            @endforeach
        </div>


        <x-schedule.slider :id="$uniqId">
            @foreach($this->currentSchedule['times'] as $times)
                <x-schedule.slider-item class="{{ $loop->first ? 'active' : '' }}">

                    @foreach($times as $time)
                        @if($fromAppointment)
                            <x-schedule.slider-element
                                wire:click.prevent="$emitUp('dateTimeSelected', '{{ $this->currentSchedule['date'] }}', '{{ $time }}', {{ $clinicId }})"
                                :time="$time"
                            />
                        @else
                            <x-schedule.slider-element
                                :link="route('appointment.index', ['clinicId' => $clinicId, 'userId' => $doctor->id, 'date' => $this->currentSchedule['date'], 'time' => $time])"
                                :time="$time"
                            />
                        @endif

                    @endforeach
                </x-schedule.slider-item>

            @endforeach

        </x-schedule.slider>

        @if(count($this->currentSchedule['times']) > 1)
            <x-schedule.slider-navigation :id="$uniqId"/>
        @endif
    </x-schedule>

@endif
