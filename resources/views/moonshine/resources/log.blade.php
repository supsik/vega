@extends("moonshine::layouts.app")

@section('sidebar-inner')
    @parent
@endsection

@section("header-inner")
    @parent

    @include('moonshine::layouts.shared.breadcrumbs', [
        'items' => [
            $resource->route('index') => $resource->title()
        ]
    ])
@endsection

@section('content')
    @include('moonshine::layouts.shared.title', [
        'title' => $resource->title(),
        'subTitle' => $resource->subTitle()
    ])

    <x-moonshine::grid>
        <div class="col-span-12">
            <x-moonshine::table>
                <x-slot:thead>
                    <th>Date</th>
                    <th>Level</th>
                    <th>Channel</th>
                    <th>Message</th>
                </x-slot:thead>
                <x-slot:tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>
                                <x-moonshine::badge
                                    color="green">{{ $item['datetime']->format('d.m.Y H:i') }}</x-moonshine::badge>
                            </td>
                            <td>
                                <x-moonshine::badge color="purple">{{ $item['level_name'] }}</x-moonshine::badge>
                            </td>
                            <td>
                                <x-moonshine::badge color="gray">{{ $item['channel'] }}</x-moonshine::badge>
                            </td>
                            <td>
                                <pre>{!! $item['message'] !!}</pre>
                            </td>
                        </tr>
                    @endforeach

                </x-slot:tbody>
            </x-moonshine::table>

            {{ $items->links('vendor.pagination.moonshine') }}
        </div>
    </x-moonshine::grid>
@endsection
