<div class="container mt-5" id="main-content">
        <h2 style="color:white">Add Package</h2>
        <form action="?action=addpaket" method="post">
            <div class="form-group">
                <label for="packageName" style="color:white">Package Name:</label>
                <input type="text" class="form-control" id="packageName" name="nama_paket" required>
            </div>
            <div class="form-group">
                <label for="packageDescription"style="color:white">Description:</label>
                <textarea class="form-control" id="packageDescription" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="packagePrice"style="color:white">Price:</label>
                <input type="number" class="form-control" id="packagePrice" name="harga" value="" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Add Package</button>
        </form>
    </div>
    <script>
        function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";  
        document.getElementById("main-content").style.marginLeft = "250px";
        document.getElementById("main").style.display="none";
        document.getElementById("homeofshoe").style.display="none";
        }

        function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "20px";
        document.getElementById("main-content").style.marginLeft= "150px";  
        document.getElementById("main").style.display="block";
        document.getElementById("homeofshoe").style.display="block";  
        }
    </script>
