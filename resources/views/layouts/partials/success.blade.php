@php
        $successMessage = session('success');
@endphp

@if ($successMessage)

<section class="fixed inset-0 flex items-center justify-center z-50 w-full">
<el-dialog open id="success-dialog" class="relative z-10" aria-labelledby="success-dialog-title" role="dialog" aria-modal="true">
        <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-2">
            <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-gray-800 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in w-60 sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                <div class="bg-slate-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-green-500/10 sm:mx-0 sm:size-10">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 text-green-400">
                                <path d="M4.5 12.75l6 6 9-13.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 id="success-dialog-title" class="text-base font-semibold text-white">Klart</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-300">{{ $successMessage }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-800 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" aria-label="Stäng bekräftelse" data-close-success class="mt-3 inline-flex w-full justify-center rounded-md bg-white/10 px-3 py-2 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20 sm:mt-0 sm:w-auto">Stäng</button>
                </div>
            </el-dialog-panel>
        </div>
    </dialog>
</el-dialog>
</section>

@endif