-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2021 a las 03:36:01
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mini-sie2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `no_control` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_semestre` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`no_control`, `id_user`, `id_semestre`, `created_at`, `updated_at`) VALUES
('165300627', 1, 1, '2021-07-15 10:39:14', '2021-07-15 10:39:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_materias_alumnos` bigint(20) UNSIGNED NOT NULL,
  `unidad_1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad_2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad_3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promedio` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `id_materias_alumnos`, `unidad_1`, `unidad_2`, `unidad_3`, `promedio`, `created_at`, `updated_at`) VALUES
(1, 1, '8', '8', '9', '8.3333333333333', '2021-07-15 10:46:31', '2021-07-15 10:47:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `clave` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`clave`, `nombre`) VALUES
('em', 'Electromecánica'),
('ia', 'Administración'),
('ic', 'Ingeniería civil ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id`, `id_user`, `nombre`, `cedula`, `created_at`, `updated_at`) VALUES
(1, 2, 'Erika', '1234567', '2021-07-15 10:39:48', '2021-07-15 10:39:48'),
(2, 4, 'Daniel', '1234567', '2021-08-27 10:17:06', '2021-08-27 10:17:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clave_carrera` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_semestre` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditos` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `clave_carrera`, `id_semestre`, `nombre`, `creditos`, `created_at`, `updated_at`) VALUES
(1, 'em', 1, 'Matemáticas Discretas ', '4', NULL, NULL),
(2, 'em', 1, 'Redes de computadoras', '5', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_alumnos`
--

CREATE TABLE `materias_alumnos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alumno_no_control` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_materia_disponible` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materias_alumnos`
--

INSERT INTO `materias_alumnos` (`id`, `alumno_no_control`, `id_materia_disponible`, `created_at`, `updated_at`) VALUES
(1, '165300627', 1, '2021-07-15 10:46:31', '2021-07-15 10:46:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_disponibles`
--

CREATE TABLE `materias_disponibles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_materia` bigint(20) UNSIGNED NOT NULL,
  `id_maestro` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materias_disponibles`
--

INSERT INTO `materias_disponibles` (`id`, `id_materia`, `id_maestro`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_01_200015_create_carrera_table', 1),
(5, '2021_02_01_200818_create_semestres_table', 1),
(6, '2021_02_01_201021_create_materias_table', 1),
(7, '2021_02_01_202304_create_alumnos_table', 1),
(8, '2021_02_01_203426_create_maestros_table', 1),
(9, '2021_02_01_203500_create_materias_disponibles_table', 1),
(10, '2021_02_02_190754_create_materias_alumnos_table', 1),
(11, '2021_02_02_190952_create_calificaciones_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestres`
--

CREATE TABLE `semestres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periodo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `semestres`
--

INSERT INTO `semestres` (`id`, `periodo`, `created_at`, `updated_at`) VALUES
(1, 'Enero-Diciembre 2020', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `telefono`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Daniel', 'Rojo', 'Aguilar', '9983000627', 'danielrojo@gmail.com', '123', '2021-07-15 10:39:14', '2021-07-15 10:39:14'),
(2, 'Erika', 'Gomez', 'Nicolas', '1234567899', 'erika@hotmail.com', '123', '2021-07-15 10:39:48', '2021-07-15 10:39:48'),
(3, 'Daniel', 'Romero', 'Aguilar', '1234567891', 'ber@hotmail.com', '123', '2021-08-27 10:16:08', '2021-08-27 10:16:08'),
(4, 'Daniel', 'jb', 'kjb', '1234567894', 'ma@gmail.com', '123', '2021-08-27 10:17:06', '2021-08-27 10:17:06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`no_control`),
  ADD KEY `alumnos_id_user_foreign` (`id_user`),
  ADD KEY `alumnos_id_semestre_foreign` (`id_semestre`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calificaciones_id_materias_alumnos_foreign` (`id_materias_alumnos`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`clave`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maestros_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materias_clave_carrera_foreign` (`clave_carrera`),
  ADD KEY `materias_id_semestre_foreign` (`id_semestre`);

--
-- Indices de la tabla `materias_alumnos`
--
ALTER TABLE `materias_alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materias_alumnos_alumno_no_control_foreign` (`alumno_no_control`),
  ADD KEY `materias_alumnos_id_materia_disponible_foreign` (`id_materia_disponible`);

--
-- Indices de la tabla `materias_disponibles`
--
ALTER TABLE `materias_disponibles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materias_disponibles_id_materia_foreign` (`id_materia`),
  ADD KEY `materias_disponibles_id_maestro_foreign` (`id_maestro`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `semestres`
--
ALTER TABLE `semestres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materias_alumnos`
--
ALTER TABLE `materias_alumnos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `materias_disponibles`
--
ALTER TABLE `materias_disponibles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `semestres`
--
ALTER TABLE `semestres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_id_semestre_foreign` FOREIGN KEY (`id_semestre`) REFERENCES `semestres` (`id`),
  ADD CONSTRAINT `alumnos_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_id_materias_alumnos_foreign` FOREIGN KEY (`id_materias_alumnos`) REFERENCES `materias_alumnos` (`id`);

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_clave_carrera_foreign` FOREIGN KEY (`clave_carrera`) REFERENCES `carreras` (`clave`),
  ADD CONSTRAINT `materias_id_semestre_foreign` FOREIGN KEY (`id_semestre`) REFERENCES `semestres` (`id`);

--
-- Filtros para la tabla `materias_alumnos`
--
ALTER TABLE `materias_alumnos`
  ADD CONSTRAINT `materias_alumnos_alumno_no_control_foreign` FOREIGN KEY (`alumno_no_control`) REFERENCES `alumnos` (`no_control`),
  ADD CONSTRAINT `materias_alumnos_id_materia_disponible_foreign` FOREIGN KEY (`id_materia_disponible`) REFERENCES `materias_disponibles` (`id`);

--
-- Filtros para la tabla `materias_disponibles`
--
ALTER TABLE `materias_disponibles`
  ADD CONSTRAINT `materias_disponibles_id_maestro_foreign` FOREIGN KEY (`id_maestro`) REFERENCES `maestros` (`id`),
  ADD CONSTRAINT `materias_disponibles_id_materia_foreign` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
