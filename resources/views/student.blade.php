<div>

    <form>
        @csrf
        {{-- STEP 1 --}}

        @if ($currentStep == 1)
            <div class="step-one">
                <div class="card">
                    <div class="card-header bg-warning text-white">Informations sur l'enfant</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nom</label>
                                    <input class="form-control" placeholder="KOUASSI" wire:model="last_name" type="text" id="last_name" value="{{ old('last_name') }}" required>
                                    <span class="text-danger">@error('last_name')Ce champ est obligatoire @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Prénoms</label>
                                <input class="form-control" placeholder="Jacque Victor" wire:model="first_name" type="text"  id="first_name" value="{{ old('first_name') }}" required>
                                <span class="text-danger">@error('first_name')Ce champ est obligatoire @enderror</span>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Genre</label>
                                    <select  class="form-control"wire:model="sex" required>
                                        <option value="" selected>Choisir le sexe</option>
                                        <option value="M">Masculin</option>
                                        <option value="F">Féminin</option>
                                    </select>
                                    <span class="text-danger">@error('sex')Ce champ est obligatoire @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Habitez-vous avec vos parents?</label><br>
                                    <label class="radio-inline"><input wire:model="habita" type="radio" required value="OUI" {{{ $habita == 'OUI' ? "checked" : "" }}}> Oui</label>
                                    <label class="radio-inline"><input wire:model="habita" type="radio" required value="NON" {{{ $habita == 'NON' ? "checked" : "" }}}> Non</label>
                                    <span class="text-danger">@error('habita')Ce champ est obligatoire @enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Lieu d'habitation</label>
                            <input class="form-control" placeholder="Abobo" wire:model="address" type="text" id="address" value="{{ old('address') }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Numéro de téléphone</label>
                                    <input class="form-control" wire:model="phone" type="tel" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" id="phone" value="{{ old('phone') }}" placeholder="00 00 00 00 00">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input class="form-control" wire:model="email" type="email" id="email" value="{{ old('email') }}" placeholder="ex: 8u9Zk@example.com">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date de naissance</label>
                                    <input class="form-control" wire:model="birth_at" type="date" id="birth_at">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Lieu de naissance</label>
                                    <input class="form-control" wire:model="birth_place" type="text" id="birth_place" placeholder="Abobo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Club</label>
                                    <select  class="form-control" wire:model="activity_group" type="text" id="activity_group">
                                        <option value="" selected>Choisir le groupe</option>
                                        <option value="Théatre">Théatre</option>
                                        <option value="Groupe Musicale">Groupe Musicale</option>
                                        <option value="Slam/Poème">Slam/Poème</option>
                                        <option value="Groupe Biblique">Groupe Biblique</option>
                                        <option value="Aucun">Aucun</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date d'entrée à l'ED</label>
                                    <input class="form-control" wire:model="date_enter" type="date" id="date_enter">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=""> L'enfant est il orphélin?</label>
                            <label class="radio-inline"><input wire:model="orph" type="radio" required value="1" {{{ $orph == '1' ? "checked" : "" }}}> Oui</label>
                            <label class="radio-inline"><input wire:model="orph" type="radio" required value="0" {{{ $orph == '0' ? "checked" : "" }}}> Non</label>
                            <span class="text-danger">@error('orph')Ce champ est obligatoire @enderror</span>
                        </div>
                        @if ($orph == 1)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Parent décédé ?</label>
                                        <select  class="form-control" wire:model="desc" type="text" id="desc">
                                            <option value="" selected></option>
                                            <option value="Père">Père</option>
                                            <option value="Mère">Mère</option>
                                            <option value="Les Deux">Les deux</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Situation familiale</label>
                                        <select  class="form-control" wire:model="orphelin" type="text" id="orphelin">
                                            <option value="" selected>Choisir la situation</option>
                                            <option value="Bonne">Bonne</option>
                                            <option value="Acceptable">Acceptable</option>
                                            <option value="Pas Bonne">Pas Bonne</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Observation</label>
                                <textarea class="form-control" wire:model="bio" type="date" id="bio" name="" id="" cols="2" rows="2"></textarea>
                                <span class="text-danger">@error('bio')Ce champ est obligatoire @enderror</span>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="">Remarque</label>
                            <textarea class="form-control" cols="2" rows="2" wire:model="content"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- STEP 2 --}}

        @if ($currentStep == 2)
            <div class="step-two">
                <div class="card">
                    <div class="card-header bg-warning text-white">Information sur le père</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nom du père</label>
                                    <input class="form-control" placeholder="KOUASSI" wire:model="last_papa" type="text" id="last_papa" value="{{ old('last_papa') }}" required>
                                    <span class="text-danger">@error('last_papa')Ce champ est obligatoire @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Prénoms du père</label>
                                <input class="form-control" placeholder="Victor" wire:model="first_papa" type="text"  id="first_papa" value="{{ old('first_papa') }}" required>
                                <span class="text-danger">@error('first_papa')Ce champ est obligatoire @enderror</span>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">lieu d'habitation</label>
                                    <input class="form-control" type="text" wire:model="address_papa" id="address_papa" value="{{ old('address_papa') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Numéro de télephone</label>
                                <input class="form-control" wire:model="phone_papa" type="tel" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" name="phone_papa" id="phone_papa" value="{{ old('phone_papa') }}" placeholder="0700000000">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input class="form-control" wire:model="email_papa" type="text" name="email_papa" id="email_papa" value="{{ old('email_papa') }}" placeholder="ex: 2vO7z@example.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Profession</label>
                                <input class="form-control" wire:model="job_parent" type="text" name="job_parent" id="job_parent" value="{{ old('job_parent') }}">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Réligion</label>
                                    <input class="form-control" wire:model="religion" type="text" name="religion" id="religion" value="{{ old('religion') }}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Eglise</label>
                                <input class="form-control" wire:model="church" type="text" name="church" id="church" value="{{ old('church') }}">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- STEP 3 --}}

        @if ($currentStep == 3)
            <div class="step-three">
                <div class="card">
                    <div class="card-header bg-warning text-white">Informations sur la mère</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nom de la mère</label>
                                    <input class="form-control" placeholder="KONE" wire:model="last_mam" type="text" id="last_mam" value="{{ old('last_mam') }}" required>
                                    <span class="text-danger">@error('last_mam')Ce champ est obligatoire @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Prénoms de la mère</label>
                                <input class="form-control" placeholder="Suizane" wire:model="first_mam" type="text"  id="first_mam" value="{{ old('first_mam') }}" required>
                                <span class="text-danger">@error('first_mam')Ce champ est obligatoire @enderror</span>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">lieu d'habitation</label>
                                    <input class="form-control" type="text" wire:model="address_mam" id="address_mam" value="{{ old('address_mam') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Numéro de télephone</label>
                                <input class="form-control" wire:model="phone_mam" type="tel" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" name="phone_mam" id="phone_mam" value="{{ old('phone_mam') }}" placeholder="0700000000">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input class="form-control" wire:model="email_mam" type="text" name="email_mam" id="email_mam" value="{{ old('email_mam') }}" placeholder="ex: 2vO7z@example.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Profession</label>
                                <input class="form-control" wire:model="job_mam" type="text" name="job_mam" id="job_mam" value="{{ old('job_mam') }}">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Réligion</label>
                                    <input class="form-control" wire:model="religion_mam" type="text" name="religion_mam" id="religion_mam" value="{{ old('religion_mam') }}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Eglise</label>
                                <input class="form-control" wire:model="church_mam" type="text" name="church_mam" id="church_mam" value="{{ old('church_mam') }}">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

            @if ($currentStep == 1)
                <div></div>
            @endif

            @if ($currentStep == 2 || $currentStep == 3)
                <input type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep" value="Retour">
                {{-- <button type="submit" class="btn btn-md btn-secondary" wire:click="decreaseStep">Retour</button> --}}
            @endif

            @if ($currentStep == 1 || $currentStep == 2)
                <input type="button" class="btn btn-md btn-success" wire:click="increaseStep" value="Suivant">
                {{--  <button type="submit" class="btn btn-md btn-success" wire:click="increaseStep">Suivant</button> --}}
            @endif

            @if ($currentStep == 3)
                <input wire:click="Send"  type="button" value="Envoyer" class="btn btn-md btn-primary">
            @endif

        </div>

    </form>


</div>
