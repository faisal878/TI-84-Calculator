<x-modal-form title="" width="w-[390px]" customId="{{ $customId }}" modelType="modal" action="" mainDivClass="text-center hidden">
    @if (@$image) <div class="col-span-2 text-center mb-4"> <img src="{{ $image }}" class="inline-block" width="100" alt=""> </div> @endif
    <div class="col-span-2">
        <img src="{{ asset('assets/img/icons/suredelete.svg') }}" class="inline-block w-[60px] h-[60px] mb-3" alt="">
        <h2 class="text-lg mb-2 leading-6 font-bold text-gray-900 whitespace-pre-wrap">{{ $dataTitle }}</h2>
        @if (@$dataDescription) <p class="text-md text-[#FF8600] mb-6 mt-4">{{ $dataDescription }}</p> @endif
    </div>
    <div class="col-span-2 text-center">
        <button type="button" target-mode-id="addCustomer" class="border close-modal-btn inline-block px-8 text-[#808191] text-sm rounded-lg py-3 close-modal" data-modal-toggle="{{ $customId }}">Cancel</button>
        <button type="submit" class="border inline-block px-6 rounded-lg bg-[#FF5555] text-white text-sm py-3 deletedNow delete-btn" data-row="{{ $dataRow }}" data-destory="{{ $customer }}"> Delete</button>
    </div>
</x-modal-form>
@once
@push('script')
<x-modal-form title="" width="w-[390px]" customId="messageModel" modelType="modal" action="" mainDivClass="text-center hidden">
    <div class="col-span-2">
        <img src="{{ asset('assets/img/Animation---1737098416408.gif') }}" class="inline-block" alt="">
        <h2 class="text-lg mb-6 font-bold text-gray-900">Deleted Successfully</h2>
    </div>
</x-modal-form>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.body.addEventListener('click', function (event) {
        if (event.target.classList.contains('delete-btn')) {
            const customerId = event.target.getAttribute('data-destory');
            const dataRow = event.target.getAttribute('data-row');
            const modal = document.getElementById(dataRow);
            modal.remove();
            fetch(`{{ $destroyLink }}${customerId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="_token"]').getAttribute('content')
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const messageModal = document.getElementById('messageModel');
                    if (messageModal) {
                        messageModal.classList.remove('hidden');
                        setTimeout(() => {
                            messageModal.classList.add('hidden');
                        }, 1700);
                    }
                } else {
                    alert('Failed to delete the customer.');
                }
            })
            .catch(error => {
                alert('Something went wrong, please try again later.');
            });
        }
    });
});


// Function to close the message modal
function closeMessageModal() {
    const modal = document.getElementById('messageModal');
    if (modal) {
        modal.classList.add('hidden'); // Hide the modal
    }
}

</script>

@endpush
@endonce