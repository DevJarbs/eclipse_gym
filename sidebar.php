<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .sidebar {
    position: fixed;
    width: 200px;
    margin: 16px;
    border-radius: 16px;
    background: #151A2D;
    height: calc(100vh - 32px);
    transition: all 0.4s ease;
  }
  
  .sidebar.collapsed {
    width: 85px;
  }
  
  .sidebar .sidebar-header {
    display: flex;
    position: relative;
    padding: 25px 20px;
    align-items: center;
    justify-content: space-between;
  }
  
  .sidebar-header .header-logo img {
    width: 50px;
    height: 50px;
    display: block;
    object-fit: contain;
    border-radius: 50%;
  }
  
  .sidebar-header .toggler {
    height: 35px;
    width: 35px;
    color: #151A2D;
    border: none;
    cursor: pointer;
    display: flex;
    background: #fff;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    transition: 0.4s ease;
  }
  
  .sidebar-header .sidebar-toggler {
    position: absolute;
    right: 20px;
  }
  
  .sidebar-header .menu-toggler {
    display: none;
  }
  
  .sidebar.collapsed .sidebar-header .toggler {
    transform: translate(-4px, 65px);
  }
  
  .sidebar-header .toggler:hover {
    background: #dde4fb;
  }
  
  .sidebar-header .toggler span {
    font-size: 1.75rem;
    transition: 0.4s ease;
  }
  
  .sidebar.collapsed .sidebar-header .toggler span {
    transform: rotate(180deg);
  }
  
  .sidebar-nav .nav-list {
    list-style: none;
    display: flex;
    gap: 4px;
    padding: 0 15px;
    flex-direction: column;
    transform: translateY(15px);
    transition: 0.4s ease;
  }
  
  .sidebar.collapsed .sidebar-nav .primary-nav {
    transform: translateY(65px);
  }
  
  .sidebar-nav .nav-link {
    color: #fff;
    display: flex;
    gap: 12px;
    white-space: nowrap;
    border-radius: 8px;
    padding: 12px 15px;
    align-items: center;
    text-decoration: none;
    transition: 0.4s ease;
  }
  
  .sidebar.collapsed .sidebar-nav .nav-link {
    border-radius: 12px;
  }
  
  .sidebar .sidebar-nav .nav-link .nav-label {
    transition: opacity 0.3s ease;
    font-family: "Cairo", sans-serif;
  }
  
  .sidebar.collapsed .sidebar-nav .nav-link .nav-label {
    opacity: 0;
    pointer-events: none;
  }
  
  .sidebar-nav .nav-link:hover {
    color: #151A2D;
    background: #fff;
  }
  
  .sidebar-nav .nav-item {
    position: relative;
    top: 30px;
    
  }
  
  .sidebar-nav .nav-tooltip {
    position: absolute;
    top: -10px;
    opacity: 0;
    color: #151A2D;
    display: none;
    pointer-events: none;
    padding: 6px 12px;
    border-radius: 8px;
    white-space: nowrap;
    background: #fff;
    left: calc(100% + 25px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    transition: 0s;
  }
  
  .sidebar.collapsed .sidebar-nav .nav-tooltip {
    display: block;
  }
  
  .sidebar-nav .nav-item:hover .nav-tooltip {
    opacity: 1;
    pointer-events: auto;
    transform: translateY(50%);
    transition: all 0.4s ease;
  }
  @media (max-width: 768px) {
  .sidebar {
    height: 56px;
    margin: 13px;
    overflow-y: hidden;
    scrollbar-width: none;
    width: calc(100% - 26px);
    max-height: calc(100vh - 26px);
    background: none;
    
  }

  .sidebar.menu-active {
    overflow-y: auto;
  }

  .sidebar .sidebar-header {
    position: sticky;
    top: 0;
    z-index: 20;
    border-radius: 16px;
    background: none;
    padding: 8px 10px;
  }

  .sidebar-header .header-logo img {
    width: 40px;
    height: 40px;
  }

  .sidebar-header .sidebar-toggler,
  .sidebar-nav .nav-item:hover .nav-tooltip {
    display: none;
  }
  
  .sidebar-header .menu-toggler {
    display: flex;
    height: 30px;
    width: 30px;
  }

  .sidebar-header .menu-toggler span {
    font-size: 1.3rem;
  }
  .sidebar-nav .nav-list .nav-item{
    position: relative;
    left: 200px;
    top: 50px;
  }
  .sidebar .sidebar-nav .nav-list {
    padding: 0 10px;
    transform: translateY(-50px);
  }

  .sidebar-nav .nav-link {
    gap: 10px;
    padding: 10px;
    font-size: 0.94rem;
  }

  .sidebar-nav .nav-link .nav-icon {
    font-size: 1.37rem;
  }

}
</style>
<body>
<aside class="sidebar">
        <header class="sidebar-header">
            <a href="trainer1.php" class="header-logo">
                <img src="img/Picsart_24-12-14_10-27-51-524.png" alt="Eclipse Fitness Logo">
            </a>
            <button class="toggler sidebar-toggler">
                <span class="material-symbols-rounded"><i class="fa-solid fa-arrow-right"></i></span>
            </button>
            <button class="toggler menu-toggler">
                <span class="material-symbols-rounded">menu</span>
            </button>
        </header>
        <nav class="sidebar-nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="trainer_dashboard.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded"><i class="fa-solid fa-house"></i></span>
                        <span class="nav-label">Dashboard</span>
                    </a>
                    <span class="nav-tooltip">Dashboard</span>
                </li>
                <li class="nav-item">
                    <a href="trainer_profile.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded"><i class="fa-solid fa-user"></i></span>
                        <span class="nav-label">Profile</span>
                    </a>
                    <span class="nav-tooltip">Profile</span>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="nav-icon material-symbols-rounded"><i class="fa-solid fa-star"></i></span>
                        <span class="nav-label">Client Feedbacks</span>
                    </a>
                    <span class="nav-tooltip">Feedback</span>
                </li>
                <li class="nav-item">
                    <a href="trainer_login.html" class="nav-link">
                        <span class="nav-icon material-symbols-rounded"><i class="fa-solid fa-right-from-bracket"></i></span>
                        <span class="nav-label">Logout</span>
                    </a>
                    <span class="nav-tooltip">Logout</span>
                </li>
            </ul>
        </nav>
    </aside>
    <script src="https://kit.fontawesome.com/e083c3d576.js" crossorigin="anonymous"></script>
    <script>
     const sidebar = document.querySelector(".sidebar");
const sidebarToggler = document.querySelector(".sidebar-toggler");
const menuToggler = document.querySelector(".menu-toggler");

// Ensure these heights match the CSS sidebar height values
let collapsedSidebarHeight = "56px"; // Height in mobile view (collapsed)
let fullSidebarHeight = "calc(100vh - 32px)"; // Height in larger screen

// Toggle sidebar's collapsed state
sidebarToggler.addEventListener("click", () => {
  sidebar.classList.toggle("collapsed");
});

// Update sidebar height and menu toggle text
const toggleMenu = (isMenuActive) => {
  sidebar.style.height = isMenuActive ? `${sidebar.scrollHeight}px` : collapsedSidebarHeight;
  menuToggler.querySelector("span").innerText = isMenuActive ? "close" : "menu";
}

// Toggle menu-active class and adjust height
menuToggler.addEventListener("click", () => {
  toggleMenu(sidebar.classList.toggle("menu-active"));
});

// (Optional code): Adjust sidebar height on window resize
window.addEventListener("resize", () => {
  if (window.innerWidth >= 1024) {
    sidebar.style.height = fullSidebarHeight;
  } else {
    sidebar.classList.remove("collapsed");
    sidebar.style.height = "auto";
    toggleMenu(sidebar.classList.contains("menu-active"));
  }
});
    </script>
</body>
</html>