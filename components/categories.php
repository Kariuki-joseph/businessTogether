	<input type="text" name="searchBar" placeholder="Enter product to search" class="form-control" id="search_bar" onkeyup="search(this.value)">
<!--main content-->
<!--products categories-->
<CENTER><b>Product Categories</b></CENTER>
<div class="categories-wrapper">
	<div class="flex-item">
		<button id="btnServices" value="services" onclick="filter(this.value)">
		<div class="iconBox">
		<img src="images/icons/services.jpg">
		<div class="categoryName">Services</div>
		</div>
		</button>
	</div>
	<div class="flex-item">
		<button id="btnElectronics" value="electronics" onclick="filter(this.value)">
		<div class="iconBox">
		<img src="images/icons/comp.jpg">
		<div class="categoryName">Electronics</div>
		</div>
		</button>
	</div>
	<div class="flex-item">
		<button id="btnPhones" value="phones" onclick="filter(this.value)">
	<div class="iconBox">
		<img src="images/icons/phones.jpg">
		<div class="categoryName">Phones and Accessories</div>
		</div>	
		</button>
	</div>
	<div class="flex-item">
		<button id="btnCommercialEquipments" value="commercial" onclick="filter(this.value)">
		<div class="iconBox">
		<img src="images/icons/tools.jpg">
		<div class="categoryName">Commercial Equipments</div>
		</div>
		</button>
	</div>


	<div class="flex-item">
		<button id="btnAgriculture" value="agriculture" onclick="filter(this.value)">
		<div class="iconBox">
		<img src="images/icons/agriculture.jpg">
		<div class="categoryName">Agriculture</div>
		</div>
		</button>
	</div>
	<div class="flex-item">
		<button id="btnFashionClothing" value="fashion" onclick="filter(this.value)">
		<div class="iconBox">
		<img src="images/icons/fashion.jpg">
		<div class="categoryName">Fashion and clothing</div>
		</div>
		</button>
	</div>
	<div class="flex-item">
		<button id="btnAnimalsPets" value="animals" onclick="filter(this.value)">
	<div class="iconBox">
		<img src="images/icons/pets.jpg">
		<div class="categoryName">Animals and pets</div>
		</div>
		</button>	
	</div>
	<div class="flex-item">
		<button id="btnVehicles" value="vehicles" onclick="filter(this.value)">
		<div class="iconBox">
		<img src="images/icons/cars.jpg">
		<div class="categoryName">Vehicles</div>
		</div>
		</button>
	</div>
</div>

<!--products categories-->