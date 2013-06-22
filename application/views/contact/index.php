<?php
	if($this->session->userdata('logedIn'))
	{
		$user = $this->UserModel->userData($this->session->userdata('id'));
		$header = array('user' => $user);
		$this->load->view('layout/header', $header);
	}
	else
		$this->load->view('layout/header');
?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGpMZUdl31Jx2Yw6LtYpuX86m6lxv_QSo&sensor=false"></script>
<script src="/assets/js/map.js" type="text/javascript"></script>
<!-- Header Map -->
<div id="map-canvas"></div>
<!-- Header Map -->

<!-- Container -->
<div class="container Contact">
    <div class="row">
        <div class="span6">
            <h2>Pošalji poruku</h2>

            <form>
                <label for="Name">Ime:</label>
                <input class="span6" type="text" placeholder="Unesite vaše ime">

                <label for="Email">Email:</label>
                <input class="span6" type="text" placeholder="Unesite vaš email">

                <label for="Message">Poruka:</label>
                <textarea class="span6" rows="5" placeholder="Unesite poruku"></textarea>
                <br>
                <button type="submit" class="btn btn-success" type="button">Pošalji</button>
            </form>
        </div>
        <dic class="span6">
            <h2>Kontakt</h2>
            <p>Kod slanja poruke formom potrebno je unijeti vaše podatke kako bi vam uspješno odgovorili na poruku.</p>
            <p class="ContactText">Ukoliko ste na stranici pronašli nešto što neradi obratite se na:</p>
            <h5>Email: bug@mioc-zd.info</h5>
            <p class="ContactText">Trebate informaciju, ne snalazite se na stranici slobodno se obratite na:</p>
            <h5>Email: info@mioc-zd.info</h5>
        </div>
    </div>
</div>
<!-- Container -->

<?php $this->load->view('layout/footer');?>