<div class="section has-background-white">
    <div class="container">
        <div class="content has-text-centered">
            <h3 class="subtitle is-2 is-capitalized">Apa kata pelanggan?</h3>
            <div class="columns">
                <div class="column is-10 is-offset-1">
                    <p class="subtitle is-4">
                        Ribuan pelanggan telah bergabung. Mulai dari Toko Tradision/kelontong, Konter Pulsa, Toko Retail, Perusahaan, dan banyak lagi.
                    </p>
                </div>
            </div>
        </div>
        <div class="columns">
            @for ($i = 0; $i < 3; $i++)
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <figure class="image is-48x48">
                                        <img class="is-rounded" src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4">John Smith</p>
                                    <p class="subtitle is-6">Founder, Indonesian Buzzer</p>
                                </div>
                            </div>

                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris.
                                <br>
                                <time datetime="2016-1-1">11:09 - 1 Juli 2020</time>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
