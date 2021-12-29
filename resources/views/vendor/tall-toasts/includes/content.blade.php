<div
class="overflow-hidden z-50 p-5 font-semibold  rounded-md border-l-8 shadow cursor-pointer pointer-events-auto select-none  dark:bg-gray-900 dark:hover:bg-gray-800"
x-bind:class="{
    'border-blue-700 bg-blue-500': toast.type === 'info',
    'border-green-700 bg-green-500': toast.type === 'success',
    'border-yellow-700 bg-yellow-500': toast.type === 'warning',
    'border-red-700 bg-red-500': toast.type === 'danger'
}"
>
<div class="flex justify-between items-center space-x-5">
    <div class="flex-1 mr-2">
        <div
        class="mb-1 text-lg text-white tracking-widest uppercase font-large dark:text-gray-100"
        x-show="toast.title !== undefined"
        x-html="toast.title"
        ></div>

        <div
        class="text-white dark:text-gray-200"
        x-show="toast.message !== undefined"
        x-html="toast.message"
        ></div>
    </div>

    @include('tall-toasts::includes.icon')
</div>
</div>
