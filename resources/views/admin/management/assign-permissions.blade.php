@extends('admin')
@php
    $metaTtitle = 'Assign Permissions To Role';
@endphp

@section('content')
    <form action="{{ route('role.sync') }}" method="post" class="bg-white p-6 rounded-2xl">
        @csrf
        <div class="flex justify-between mb-6">
            <div class=""><h2 class="text-lg font-bold text-gray-900">Assign Permissions To Role {{ $role->name }}</h2></div>
            <div class="w-[30%]">
                <input type="hidden" name="role" value="{{ $role->id }}">
                {{-- <label for="" class="text-[#5A5A5D] mb-1 text-sm block">Select  Role</label> --}}

                {{-- <select name="role" id="" class="bg-[#FCFCFC] border-[#E5E7EB] w-full bg-transparent rounded-md placeholder-transparent px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600 category-dropdown text-sm py-1">
                    @if ($role->isNotEmpty())
                        @foreach ($role as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    @endif
                </select> --}}
            </div>
        </div>
        <div>
            <div class="border-b border-gray-300 mb-5 pb-4">
                <h3 class="text-lg block mb-4 font-bold">Vouchers</h3>
                <h4 class="text-base mb-4">Purchase Sale Voucher (Non Stock)</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="voucherNoneStock.create" {{ in_array('voucherNoneStock.create', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="voucherNoneStock.edit" {{ in_array('voucherNoneStock.edit', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="voucherNoneStock.view" {{ in_array('voucherNoneStock.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="voucherNoneStock.deleted" {{ in_array('voucherNoneStock.deleted', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Purchase Voucher</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="purchase.create" {{ in_array('purchase.create', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="purchase.edit" {{ in_array('purchase.edit', $assignedPermissions) ? 'checked' : '' }} id="purchase.edit" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="purchase.view" {{ in_array('purchase.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="purchase.delete" {{ in_array('purchase.delete', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Sale Voucher</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="sale.create" {{ in_array('sale.create', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="sale.edit" {{ in_array('sale.edit', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="sale.view" {{ in_array('sale.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="sale.delete" {{ in_array('sale.delete', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Bank / Cash Voucher</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="bankCash.create" {{ in_array('bankCash.create', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="bankCash.edit" {{ in_array('bankCash.edit', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="bankCash.view" {{ in_array('bankCash.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="bankCash.delete" {{ in_array('bankCash.delete', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Journal Voucher</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="jv.create" {{ in_array('jv.create', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="jv.edit" {{ in_array('jv.edit', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="jv.view" {{ in_array('jv.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="jv.delete" {{ in_array('jv.delete', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
            </div>
            <div class="border-b border-gray-300 mb-5">
                <h3 class="text-lg block mb-4 font-bold">Control Ledger</h3>
                <div class="flex items-center justify-between mb-4 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="controlLedger.view" {{ in_array('controlLedger.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                </div>
            </div>
            <div class="border-b border-gray-300 mb-5 pb-4">
                <h3 class="text-lg block mb-4 font-bold">Reports</h3>
                <h4 class="text-base mb-4">Sale/Purchase Report</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="salePurchaseReport.view" {{ in_array('salePurchaseReport.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Purchase Report</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="purchaseReport.view" {{ in_array('purchaseReport.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Sale Report</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="saleReport.view" {{ in_array('saleReport.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Daily Transaction Report</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="dailyTransaction.view" {{ in_array('dailyTransaction.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Trial Balance</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="trialBalance.view" {{ in_array('trialBalance.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                </div>
            </div>
            <div class="border-b border-gray-300 mb-5 pb-4">
                <h3 class="text-lg block mb-4 font-bold">Products</h3>
                <h4 class="text-base mb-4">Categories</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="categories.create" {{ in_array('categories.create', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="categories.edit" {{ in_array('categories.edit', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="categories.view" {{ in_array('categories.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="categories.delete" {{ in_array('categories.delete', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Products</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="products.create" {{ in_array('products.create', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="products.edit" {{ in_array('products.edit', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="products.view" {{ in_array('products.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="products.delete" {{ in_array('products.delete', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
            </div>
            <div class="border-b border-gray-300 mb-5 pb-4">
                <h3 class="text-lg block mb-4 font-bold">Accounts</h3>
                <h4 class="text-base mb-4">Assets</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="assets.create" {{ in_array('assets.create', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="assets.edit" {{ in_array('assets.edit', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="assets.view" {{ in_array('assets.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="assets.delete" {{ in_array('assets.delete', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Liabilities</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="liabilities.create" {{ in_array('liabilities.create', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="liabilities.edit" {{ in_array('liabilities.edit', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="liabilities.view" {{ in_array('liabilities.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="liabilities.delete" {{ in_array('liabilities.delete', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Equity</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="equity.create" {{ in_array('equity.create', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="equity.edit" {{ in_array('equity.edit', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="equity.view" {{ in_array('equity.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="equity.delete" {{ in_array('equity.delete', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Revenue</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="revenue.create" {{ in_array('revenue.create', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="revenue.edit" {{ in_array('revenue.edit', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="revenue.view" {{ in_array('revenue.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="revenue.delete" {{ in_array('revenue.delete', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Expenses</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="expenses.create" {{ in_array('expenses.create', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="expenses.edit" {{ in_array('expenses.edit', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="expenses.view" {{ in_array('expenses.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="expenses.delete" {{ in_array('expenses.delete', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
            </div>
            <div class="border-b border-gray-300 mb-5">
                <h3 class="text-lg block mb-4 font-bold">Vehicles</h3>
                <div class="flex items-center justify-between mb-4 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="vehicles.create" {{ in_array('vehicles.create', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="vehicles.edit" {{ in_array('vehicles.edit', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="vehicles.view" {{ in_array('vehicles.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="vehicles.delete" {{ in_array('vehicles.delete', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
            </div>
            <div class="border-b border-gray-300 mb-5">
                <h3 class="text-lg block mb-4 font-bold">Customers</h3>
                <div class="flex items-center justify-between mb-4 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="customers.create" {{ in_array('customers.create', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="customers.edit" {{ in_array('customers.edit', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="customers.view" {{ in_array('customers.view', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="customers.delete" {{ in_array('customers.delete', $assignedPermissions) ? 'checked' : '' }} id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
            </div>
            {{-- <div class="border-b border-gray-300 mb-5 pb-4">
                <h3 class="text-lg block mb-4 font-bold">Management</h3>
                <h4 class="text-base mb-4">User Management</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="userManagement.create" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="userManagement.edit" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="userManagement.view" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="userManagement.delete" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Role</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="role.create" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="role.edit" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="role.view" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="role.delete" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
                <h4 class="text-base mb-4">Assign Permissions</h4>
                <div class="flex items-center justify-between mb-6 pr-5">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="assignPermissions.create" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="assignPermissions.edit" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="assignPermissions.view" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="assignPermissions.delete" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label>
                </div>
            </div> --}}
            <div class="border-b border-gray-300 mb-5">
                <h3 class="text-lg block mb-4 font-bold">Settings</h3>
                <div class="flex items-center justify-between mb-4 pr-5">
                    {{-- <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="settings.create" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Create</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="settings.edit" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Edit</span>
                    </label> --}}
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="settings.view"  {{ in_array('settings.view', $assignedPermissions) ? 'checked' : '' }}  id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">View Only</span>
                    </label>
                    {{-- <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="settings.delete" id="" class="appearance-none bg-gray-300 checked:bg-blue-600 border-none w-[14px] h-[14px]">
                        <span class="text-sm text-gray-700">Delete</span>
                    </label> --}}
                </div>
            </div>
            
            <div class="flex justify-end">
                <input type="submit" class="bg-blue-600 text-white py-2 px-6 text-sm inline-block rounded-md" name="Save" value="Save">
            </div>
        </div>
    </form>
@endsection


@push('script')

@endpush
