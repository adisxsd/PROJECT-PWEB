<div class="container mt-5" id="main-content">
        <h2 style="color:white">Add Merk</h2>
        <form action="?action=addmerk" method="post">
            <div class="form-group">
                <label for="packageName" style="color:white">Brand Name:</label>
                <input type="text" class="form-control" id="packageName" name="nama_merk" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Merk</button>
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
