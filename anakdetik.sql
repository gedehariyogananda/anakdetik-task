-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2024 pada 14.47
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anakdetik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah_buku` bigint(20) NOT NULL,
  `file_buku` text NOT NULL,
  `cover_buku` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `user_id`, `judul_buku`, `category_id`, `deskripsi`, `jumlah_buku`, `file_buku`, `cover_buku`, `created_at`, `updated_at`) VALUES
(2, 4, 'Doloribus voluptates culpa molestiae dolor quae molestiae cumque cumque.', 11, 'Hic tenetur cupiditate quod dolorem dolorem. Ipsa quidem ut neque reiciendis in sapiente. Tempore totam dicta placeat iure maiores. Rerum quo ut rerum quo quas.', 34, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(3, 1, 'Voluptatem explicabo quia explicabo ut.', 28, 'Ut accusantium dolor ipsum ipsa dolorem. Facere aspernatur animi necessitatibus ea modi. Occaecati et labore et occaecati et assumenda. Debitis reprehenderit illo commodi modi.', 27, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(4, 4, 'Unde alias nemo ut eius vel.', 5, 'Qui non architecto non maiores aut vitae voluptatem ea. Quo quaerat vel consequuntur harum voluptatem esse sunt. Aut quia possimus fugit inventore itaque a. Molestiae labore blanditiis dignissimos debitis architecto.', 48, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(5, 7, 'Et consequatur non sed voluptatem tempore consequuntur quae provident.', 14, 'Odit dolor id facere qui soluta. Provident voluptates eligendi suscipit doloremque quia ea quod. Magni quo dicta et optio quos ipsa ab.', 25, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(6, 7, 'Vero qui laboriosam provident consequatur esse.', 30, 'Officiis voluptatem et id est totam. Nemo laborum ut ad qui. Nobis pariatur qui a dolor asperiores libero adipisci a.', 50, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(7, 9, 'Sapiente et illo repellendus est.', 4, 'Adipisci molestias quas et ut a perferendis id. Ipsa sed qui libero sit est. Voluptates iusto et nisi. Suscipit similique laudantium ea omnis dolor est aut.', 16, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(8, 5, 'Reiciendis fugit accusantium in laborum impedit.', 1, 'Totam sit ea quia. Quisquam error omnis asperiores tenetur delectus beatae.', 31, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(9, 5, 'Et eum et eaque ut.', 9, 'Quo laborum qui dolorem quia rerum enim eos. Voluptatem voluptatum omnis eum reiciendis reprehenderit harum eligendi earum. Modi impedit consequatur quisquam rem. Dolor soluta facere et eaque est.', 39, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(10, 2, 'Et eos eaque aut ab eum modi.', 3, 'Asperiores mollitia aliquam ut recusandae ab reiciendis earum. Et fuga eum officia voluptatum et eos. Autem ut est minima magni consequatur. Quaerat explicabo commodi eius odio fugiat aliquid voluptatem. Voluptas asperiores expedita odio nam a autem dolores quaerat.', 43, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(11, 5, 'Eum et consequuntur laboriosam et quia sunt.', 13, 'Saepe quod consequatur aut quasi assumenda quisquam sapiente sunt. Fugiat corrupti harum et. Omnis commodi sunt et est tempore error dicta et. Exercitationem qui tempore ipsa molestiae aut officiis.', 13, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(12, 9, 'Molestias necessitatibus et nesciunt commodi.', 18, 'Distinctio sed excepturi qui eos. Magnam esse quisquam ut aspernatur voluptatum voluptatem reprehenderit voluptatum. Quae non consequatur earum alias voluptas ipsa velit optio.', 39, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(13, 2, 'Architecto et ut explicabo id sapiente.', 12, 'Libero porro amet dolor minus. Odio dolore necessitatibus iusto adipisci. Similique neque ut et numquam.', 5, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(14, 6, 'Est nihil vel in et voluptatum ratione.', 28, 'Et sint delectus aliquid quos perferendis natus. Voluptatem et est quae accusamus quo beatae. Voluptas et vero consequatur consequatur provident nemo rerum.', 1, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(15, 6, 'Suscipit dolorum consectetur quas omnis et.', 9, 'Ipsum aut ut et in rerum enim sit. Voluptatem dolor non libero quia. Et quo est rerum facilis est.', 15, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(16, 2, 'Eum mollitia quis nihil.', 20, 'Neque vero quibusdam sapiente aperiam. Alias eum et consectetur possimus quia dolore. Quia qui dolores aut quia consequuntur similique.', 38, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(17, 3, 'Voluptatem quibusdam quod qui animi.', 2, 'Repellat aliquid aperiam molestiae dolor sunt ducimus id. Vel sed corrupti porro quibusdam. Sint nisi adipisci quam debitis provident et possimus. Dolorem velit ut qui voluptatem aut quas provident.', 28, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(18, 10, 'Consequatur accusamus impedit saepe eos voluptatem.', 4, 'Iste asperiores voluptate id sed voluptate laboriosam. Aut earum iusto facere et ipsa quidem dignissimos nulla. Ut in vitae voluptatum sunt. Vero et est praesentium.', 28, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(19, 1, 'Sed unde quos distinctio blanditiis reprehenderit a maiores.', 21, 'Facere quas fugit deserunt nulla sunt ullam voluptatem nihil. Quia magnam voluptate quos voluptas quasi quos. Aut ea ipsum nemo ab. Quibusdam ut eaque aut ea sint deserunt. Voluptate consequuntur velit nihil eius tempore esse est repudiandae.', 19, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(20, 7, 'Quidem sunt odit earum quas et possimus.', 6, 'Eius qui sed ex blanditiis tempore ea rerum. Natus omnis dolor amet veniam. Quos aspernatur rem iusto adipisci beatae molestias beatae. Quisquam aut ut pariatur animi porro.', 36, 'file_buku/buku1.pdf', 'cover_buku/ganteng.jpg', '2024-08-11 01:38:59', '2024-08-11 01:38:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Novel', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(2, 'Komik', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(3, 'Ensiklopedia', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(4, 'Biografi', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(5, 'Fiksi', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(6, 'Non-Fiksi', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(7, 'Pendidikan Agama', '2024-08-11 01:38:59', '2024-08-11 05:11:49'),
(9, 'Agama', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(10, 'Teknologi', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(11, 'Kesehatan', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(12, 'Olahraga', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(13, 'Bisnis', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(14, 'Politik', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(15, 'Hukum', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(16, 'Kesehatan', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(17, 'Kuliner', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(18, 'Pariwisata', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(19, 'Seni', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(20, 'Musik', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(21, 'Film', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(22, 'Pertanian', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(23, 'Perikanan', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(24, 'Peternakan', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(25, 'Kehutanan', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(26, 'Pertambangan', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(27, 'Perindustrian', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(28, 'Perdagangan', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(29, 'Pariwisata', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(30, 'Transportasi', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(31, 'Komunikasi', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(32, 'Pendidikan', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(33, 'Kesehatan', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(34, 'Kesejahteraan Sosial', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(35, 'Kebudaya', '2024-08-11 01:38:59', '2024-08-11 01:38:59'),
(36, 'Pendidikan', '2024-08-11 05:19:15', '2024-08-11 05:19:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_11_060241_create_categories_table', 1),
(6, '2024_08_11_060307_create_books_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roles` enum('admin','user') NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `roles`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Woodrow Wiza PhD', 'ikerluke@example.com', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2024-08-11 01:38:58', '2024-08-11 01:38:58'),
(2, 'Prof. Augustus O\'Keefe III', 'monserrate93@example.org', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2024-08-11 01:38:58', '2024-08-11 01:38:58'),
(3, 'Miss Megane Torp', 'jamaal71@example.com', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2024-08-11 01:38:58', '2024-08-11 01:38:58'),
(4, 'Sandrine Beier', 'tod.kreiger@example.org', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2024-08-11 01:38:58', '2024-08-11 01:38:58'),
(5, 'Mr. Shayne Schumm', 'ujohns@example.com', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2024-08-11 01:38:58', '2024-08-11 01:38:58'),
(6, 'Irving Heller', 'vidal98@example.org', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2024-08-11 01:38:58', '2024-08-11 01:38:58'),
(7, 'Faye Schneider', 'araceli.wilkinson@example.com', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2024-08-11 01:38:58', '2024-08-11 01:38:58'),
(8, 'Noemi Weimann', 'uveum@example.net', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2024-08-11 01:38:58', '2024-08-11 01:38:58'),
(9, 'Pierce Crona Sr.', 'marjorie07@example.net', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2024-08-11 01:38:58', '2024-08-11 01:38:58'),
(10, 'Ms. Virgie Dare IV', 'richie70@example.net', 'user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2024-08-11 01:38:58', '2024-08-11 01:38:58'),
(11, 'admin', 'admin@gmail.com', 'admin', '$2y$10$7YXUpEzMTdDdoGDwFhLqKeLalYVljb9BrgqPJxYEBBiQdr/azI9xK', '2024-08-11 01:38:59', '2024-08-11 01:38:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_user_id_foreign` (`user_id`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
