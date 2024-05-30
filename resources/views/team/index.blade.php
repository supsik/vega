@extends('layouts.main')

@section('title', 'Управление клиникой - ' . config('app.name'))

@section('content')
    <div class="team-page">
        <div class="container-fluid">
            <div class="team-page__inner">
                <x-breadcrumbs>
                    <x-breadcrumbs.item isActive isLarge>Управление клиникой</x-breadcrumbs.item>
                </x-breadcrumbs>

                <div class="team-page__list section-top-space">

                    @foreach ($employees as $employee)
                        <x-person class="person--link" :link="route('team.show', $employee->slug)">
                            <x-slot:photo>
                                <x-person.photo :url="$employee->getFirstMediaUrl('photo')"
                                                :name="$employee->name"></x-person.photo>
                            </x-slot:photo>

                            <x-slot:info>
                                <x-person.name :value="$employee->name"></x-person.name>
                                <x-person.position :value="$employee->position->name"></x-person.position>
                            </x-slot:info>
                        </x-person>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
