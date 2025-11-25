@extends('admin')
@php
    $metaTtitle = 'Activity Logs';
@endphp

@section('content')

 <div class="bg-white p-6 rounded-2xl">
    <h2 class="text-base font-bold text-gray-900 mb-2">User Activity Logs</h2>
    <h3 class="text-sm mb-2 text-gray-900">User Name: <b>{{ $user->first_name }} {{ $user->last_name }}</b></h3>
    <div class="bg-[#f9f9f9] rounded-2xl p-3 border border-gray-300">
        <div class="overflow-x-auto">

            <table class="w-full text-xs">
                <thead class="text-gray-700 uppercase bg-[#F7F9FD]">
                    <tr>
                        <th scope="col" class="text-left px-2 py-2">Action</th>
                        <th scope="col" class="text-left px-2 py-2" width="40%">Context</th>
                        <th scope="col" class="text-left px-2 py-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activityLogs as $log)
                        <tr class="{{ $loop->iteration % 2 == 1 ? 'bg-white' : 'bg-[#F7F9FD]' }} {{ $log->action == 'deleted' ? 'text-red-600' : '' }} {{ $log->action == 'update' ? 'text-green-600' : '' }} uppercase">
                            <td class="px-2 py-2">{{ $log->action }}</td>
                            <td class="px-2 py-2">
                                 @if($log->mode)    
                                    @if (class_basename($log->model_type) == 'VoucherDetail')
                                        {{ $log->mode->transaction_type }} #{{ $log->mode->id }}
                                    @elseif (class_basename($log->model_type) === 'ChartOfAccount')
                                        {{ $log->mode->name }} #{{ $log->mode->id }}
                                    @elseif (class_basename($log->model_type) == 'Customer')
                                        {{ $log->mode->name }} #{{ $log->mode->id }}
                                    @elseif (class_basename($log->model_type) == 'User')
                                        {{ $log->mode->first_name }} {{ $log->mode->last_name }} #{{ $log->mode->id }}
                                    @elseif (class_basename($log->model_type) == 'Voucher')
                                        {{ $log->mode->type }} #{{ $log->mode->id }}
                                    @endif
                                    {{-- {{ class_basename($log->model_type) }} - {{ $log->mode->name ?? $log->mode->title ?? $log->mode->id }} --}}
                                @else
        
                                @endif
                            </td>
                            <td class="px-2 py-2">{{ date('m/d/Y', strtotime($log->created_at )) }} - {{ date('H:i', strtotime($log->created_at )) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-2 py-2 text-center text-gray-500">No activity logs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="border-t border-gray-300 pt-3 flex items-center justify-between">
                <div> <span class="text-sm text-gray-400"> Showing {{ $activityLogs->firstItem() }} to {{ $activityLogs->lastItem() }} of {{ $activityLogs->total() }} customers </span> </div> 
                {{ $activityLogs->links() }} 
            </div>
        </div>
    </div>
</div>

@endsection



@push('script')

@endpush
