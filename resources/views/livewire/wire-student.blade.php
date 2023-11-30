<div>
    <div class="w-full bg-white h-screen">
        <div class="bg-gradient-to-b from-yellow-700 to-yellow-500 h-96">
            <div class="mx-auto text-center ">
                <h1 class="text-xl font-bold text-white pt-4 lg:text-4xl">Renseigner toutes les informations sur l'enfant</h1>
            </div>
        </div>
        <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
            <div class="bg-gray-600 w-full shadow rounded-xl p-8 sm:p-12 -mt-72">
                <div class="mx-auto max-w-2xl">
                    <form>
                        @csrf
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Indivation sur l'enfant</h2>
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                <input wire:model="last_name" type="text" id="last_name" value="{{ old('last_name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="KOUASSI" required/>
                                <div class="text-red-500">@error('last_name') {{ $message }} @enderror</div>
                            </div>

                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenoms</label>
                                <input wire:model="first_name" type="text"  id="first_name" value="{{ old('first_name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jean Jacques" required/>
                                <div class="text-red-500">@error('first_name') {{ $message }} @enderror</div>
                            </div>

                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sexe</label>
                                <select wire:model="sex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option selected>Sexe</option>
                                    <option value="M">Masculin</option>
                                    <option value="F">Féminin</option>
                                </select>
                                {{-- <div class="flex items-center mr-4">
                                    <input wire:model="sex" id="M" type="radio" value="M"  name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                                    <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">M</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input wire:model="sex" id="F" type="radio" value="F" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                                    <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">F</label>
                                </div> --}}
                                <div class="text-red-500">@error('sex') {{ $message }} @enderror</div>
                            </div>

                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lieu d'habitation</label>
                                <input wire:model="address" type="text" id="address" value="{{ old('address') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Abobo"/>
                            </div>

                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numéro de téléphone</label>
                                <input wire:model="phone" type="tel" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" id="phone" value="{{ old('phone') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0700000000"/>
                            </div>

                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input wire:model="email" type="email" id="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="koFtH@example.com"/>
                            </div>

                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de naissance</label>
                                <input wire:model="birth_at" type="date" id="birth_at" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"/>
                            </div>

                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lieu de naissance</label>
                                <input wire:model="birth_place" type="text" id="birth_place" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Abobo"/>
                            </div>

                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Groupe d'activité</label>
                                <input wire:model="activity_group" type="text" id="activity_group" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Théatre"/>
                            </div>

                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date d'entrée</label>
                                <input wire:model="date_enter" type="date" id="date_enter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="09/09/2022"/>
                            </div>

                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">L'enfant est il orphélin?</label>
                                <select wire:model="orph" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option selected></option>
                                    <option value="oui">Oui</option>
                                    <option value="non">Non</option>
                                </select>
                                <div class="text-red-500">@error('orph') {{ $message }} @enderror</div>
                            </div>

                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Précisez</label>
                                <input wire:model="orphelin" type="text" id="orphelin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Père ou mère"/>
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarques</label>
                                <textarea wire:model="content" id="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Remarques sur l'enfant"></textarea>
                            </div>
                        </div>
                        <h2 class="mb-4 text-xl font-bold py-2 text-gray-900 dark:text-white">Information sur les parents</h2>
                        <div id="accordion-collapse" data-accordion="collapse">
                            <h2 id="accordion-collapse-heading-1">
                                <button
                                    type="button"
                                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                    data-accordion-target="#accordion-collapse-body-1"
                                    aria-expanded="false"
                                    aria-controls="accordion-collapse-body-1"
                                    >
                                    <span>Information sur le père</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du père</label>
                                            <input wire:model ="last_papa" type="text" name="last_papa" id="last_papa" value="{{ old('last_papa') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="KOUASSI" required/>
                                            <div class="text-red-500">@error('last_papa') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenoms du père</label>
                                            <input wire:model="first_papa" type="text" name="first_papa" id="first_papa" value="{{ old('first_papa') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jean Jacques" required/>
                                            <div class="text-red-500">@error('first_papa') {{ $message }} @enderror</div>
                                        </div>

                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lieu d'habitation</label>
                                            <input type="text" name="address_papa" id="address_papa" value="{{ old('address_papa') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Abobo"/>
                                        </div>

                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numéro de téléphone</label>
                                            <input type="tel" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" name="phone_papa" id="phone_papa" value="{{ old('phone_papa') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0700000000"/>
                                        </div>

                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                            <input wire:model="email_papa" type="email_papa" name="email_papa" id="email_papa" value="{{ old('email_papa') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="koFtH@example.com"/>
                                        </div>

                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profession</label>
                                            <input wire:model="job_parent" type="job_parent" name="job_parent" id="job_parent" value="{{ old('job_parent') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Merdecin"/>
                                        </div>

                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Réligion</label>
                                            <input wire:model="religion" type="religion" name="religion" id="religion" value="{{ old('religion') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Christienne"/>
                                        </div>

                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Eglise</label>
                                            <input wire:model="church" type="church" name="church" id="church" value="{{ old('church') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="CMA Dokui1"/>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <h2 id="accordion-collapse-heading-2">
                                <button
                                    type="button"
                                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                    data-accordion-target="#accordion-collapse-body-2"
                                    aria-expanded="false"
                                    aria-controls="accordion-collapse-body-2"
                                    >
                                    <span>Information sur la mère</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 py-4">
                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de la mère</label>
                                            <input wire:model ="last_mam" type="text" name="last_mam" id="last_mam" value="{{ old('last_mam') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="KOUASSI" required=""/>
                                            <div class="text-red-500">@error('last_mam') {{ $message }} @enderror</div>
                                        </div>
                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenoms de la mère</label>
                                            <input wire:model="first_mam" type="text" name="first_mam" id="first_mam" value="{{ old('first_mam') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jean Jacques" required=""/>
                                            <div class="text-red-500">@error('first_mam') {{ $message }} @enderror</div>
                                        </div>

                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lieu d'habitation</label>
                                            <input type="text" name="address_mam" id="address_mam" value="{{ old('address_mam') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Abobo"/>
                                        </div>

                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numéro de téléphone</label>
                                            <input type="tel" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" name="phone_mam" id="phone_mam" value="{{ old('phone_mam') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0700000000"/>
                                        </div>

                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                            <input wire:model="email_mam" type="email_mam" name="email_mam" id="email_mam" value="{{ old('email_mam') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder=""/>
                                        </div>

                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profession</label>
                                            <input wire:model="job_mam" type="job_mam" name="job_mam" id="job_mam" value="{{ old('job_mam') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"/>
                                        </div>

                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Réligion</label>
                                            <input wire:model="religion_mam" type="religion_mam" name="religion_mam" id="religion_mam" value="{{ old('religion_mam') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder=""/>
                                        </div>

                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Eglise</label>
                                            <input wire:model="church_mam" type="church_mam" name="church_mam" id="church_mam" value="{{ old('church_mam') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input wire:click="Send" value="Envoyer" type="button" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
