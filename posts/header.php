<style>
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #2ecc71;
        color: white;
        padding: 15px 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .header .website-name {
        font-size: 24px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .header .header-buttons {
        display: flex;
        gap: 10px;
    }

    .header-buttons a {
        padding: 10px 15px;
        background-color: #27ae60;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .header-buttons .logout-btn {
        background-color: #e74c3c;
    }

    @media (max-width: 768px) {
        .header .website-name {
            font-size: 20px;
        }

        .header-buttons a {
            font-size: 12px;
            padding: 8px 12px;
        }
    }

    @media (max-width: 480px) {
        .header {
            flex-direction: column;
            align-items: flex-start;
        }

        .header .website-name {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .header-buttons {
            width: 100%;
            justify-content: flex-start;
        }

        .header-buttons a {
            font-size: 12px;
            padding: 8px 10px;
            margin-right: 10px;
        }
    }
</style>

<div class="header">
    <div class="website-name">My Blog</div>

    <div class="header-buttons">
        <a href="/create-post" class="create-post-btn">Create Post</a>
        <a href="../scripts/logout.php" class="logout-btn">Logout</a>
    </div>
</div>