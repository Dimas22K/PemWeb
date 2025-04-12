const lokasiData = [
    {
      nama: "Gudang Surabaya",
      alamat: "Jl. Raya Darmo No.45",
      kota: "Surabaya",
      lat: -7.2872,
      lng: 112.7368
    },
    {
      nama: "Mitra Bandung",
      alamat: "Jl. Soekarno Hatta No.12",
      kota: "Bandung",
      lat: -6.9338,
      lng: 107.6045
    },
    {
      nama: "Gudang Jakarta",
      alamat: "Jl. Sudirman No.55",
      kota: "Jakarta",
      lat: -6.2146,
      lng: 106.8451
    },
    {
      nama: "Mitra Makassar",
      alamat: "Jl. Pettarani No.21",
      kota: "Makassar",
      lat: -5.1469,
      lng: 119.4074
    }
  ];
  
  const lokasiList = document.getElementById("lokasiList");
  const searchBox = document.getElementById("searchBox");
  
  function tampilkanLokasi(data) {
    lokasiList.innerHTML = "";
    data.forEach(lokasi => {
      const div = document.createElement("div");
      div.className = "lokasi-card";
      div.innerHTML = `<h3>${lokasi.nama}</h3><p>${lokasi.alamat}</p><p>${lokasi.kota}</p>`;
      lokasiList.appendChild(div);
    });
  }
  
  searchBox.addEventListener("input", function () {
    const keyword = this.value.toLowerCase();
    const filtered = lokasiData.filter(lokasi =>
      lokasi.nama.toLowerCase().includes(keyword) ||
      lokasi.kota.toLowerCase().includes(keyword)
    );
    tampilkanLokasi(filtered);
    updateMarkers(filtered);
  });
  
  let map;
  let markers = [];
  
  function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: -6.2146, lng: 106.8451 }, // Jakarta sebagai pusat awal
      zoom: 5
    });
  
    lokasiData.forEach(lokasi => {
      const marker = new google.maps.Marker({
        position: { lat: lokasi.lat, lng: lokasi.lng },
        map,
        title: lokasi.nama
      });
      markers.push(marker);
    });
  
    tampilkanLokasi(lokasiData);
  }
  
  function updateMarkers(filteredData) {
    markers.forEach(marker => marker.setMap(null));
    markers = [];
  
    filteredData.forEach(lokasi => {
      const marker = new google.maps.Marker({
        position: { lat: lokasi.lat, lng: lokasi.lng },
        map,
        title: lokasi.nama
      });
      markers.push(marker);
    });
  }
  