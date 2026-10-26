<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#0c1112">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="api-base" content="{{ url('/api') }}">
  <meta name="description" content="Arena 26: plataforma interactiva de gestión de liga de básquetbol, resultados, jugadores y clasificación.">
  <title>ARENA 26 · Liga de Básquetbol</title>
  <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🏀</text></svg>">
  <link rel="stylesheet" href="{{ asset('css/arena.css') }}">
  <script defer src="{{ asset('js/app.js') }}"></script>
</head>
<body>
  <div class="site-shell">
    <header class="site-header">
      <button class="brand" data-go="inicio" aria-label="Ir al resumen"><span class="brand-mark"><span>✳</span></span><span class="brand-word">ARENA<span>26</span><small>BASKET LEAGUE OS</small></span></button>
      <nav class="nav-pills" aria-label="Navegación principal">
        <button class="nav-link active" data-view="inicio">Dashboard</button>
        <button class="nav-link" data-view="equipos">Equipos</button>
        <button class="nav-link" data-view="jugadores">Jugadores</button>
        <button class="nav-link" data-view="partidos">Calendario</button>
        <button class="nav-link" data-view="posiciones">Ranking</button>
        <button class="nav-link" data-view="respaldo">Datos</button>
      </nav>
      <div class="header-tag"><span class="live-dot"></span> TEMPORADA 2026 <span class="header-tag-arrow">↗</span></div>
    </header>

    <main>
      <div class="page-head">
        <div><p class="breadcrumb">ARENA / LIGA / <span>CONTROL DE TORNEO</span></p><h1 id="page-title">El centro del juego<span class="dot-title">.</span></h1><p id="page-subtitle" class="page-intro">Un nuevo nivel para administrar tu liga de básquetbol.</p></div>
        <div class="head-side"><span class="date-label" id="today-date"></span><button class="btn btn-accent" data-go="partidos">＋ Crear partido <span>↗</span></button></div>
      </div>

      <section id="view-inicio" class="view">
        <div class="hero">
          <div class="court-lines" aria-hidden="true"><svg viewBox="0 0 540 300" fill="none"><rect x="1" y="1" width="538" height="298" rx="28" stroke="currentColor"/><path d="M270 1V299" stroke="currentColor"/><circle cx="270" cy="150" r="68" stroke="currentColor"/><path d="M1 70H85V230H1M539 70H455V230H539" stroke="currentColor"/><path d="M85 100A50 50 0 0 1 85 200M455 100A50 50 0 0 0 455 200" stroke="currentColor"/></svg></div>
          <div class="hero-copy">
            <div class="tag-row"><span class="status-pill"><span class="mini-pulse"></span> LIGA EN MARCHA</span><span class="tag-year">SEASON // 2026</span></div>
            <h2>EL JUEGO<br><span>NO SE DETIENE.</span></h2>
            <p>Cada partido cuenta. Controla tu campeonato, registra cada punto y compite por la cima.</p>
            <button class="btn btn-white" data-go="posiciones">Explorar clasificación <span>↗</span></button>
          </div>
          <div class="match-display">
            <div class="display-top"><span>PRÓXIMO ENCUENTRO</span><span class="display-live"><span></span> PROGRAMADO</span></div>
            <div class="match-lineup"><div class="match-club"><span class="club-orbit">H</span><strong id="hero-local">HALCONES</strong><small>LOCAL</small></div><div class="match-vs">VS</div><div class="match-club"><span class="club-orbit away">A</span><strong id="hero-visitante">ÁGUILAS</strong><small>VISITANTE</small></div></div>
            <div class="display-bottom"><span>🏀 PARTIDO DE LIGA</span><strong id="hero-fecha">PRÓXIMAMENTE</strong></div>
          </div>
        </div>

        <div class="section-title"><div><span class="section-index">01 — PANORAMA</span><h3>La liga en números</h3></div><span class="section-side">ACTUALIZACIÓN AUTOMÁTICA <span class="green-dot"></span></span></div>
        <div class="stats-grid">
          <article class="stat-card"><span class="stat-symbol">◈</span><p>EQUIPOS ACTIVOS</p><div class="stat-number"><strong id="stat-equipos">0</strong><span>CLUBES</span></div><div class="stat-track"><span class="track-lime"></span></div></article>
          <article class="stat-card"><span class="stat-symbol">♟</span><p>JUGADORES</p><div class="stat-number"><strong id="stat-jugadores">0</strong><span>ATLETAS</span></div><div class="stat-track"><span class="track-purple"></span></div></article>
          <article class="stat-card"><span class="stat-symbol">⌁</span><p>POR DISPUTAR</p><div class="stat-number"><strong id="stat-partidos">0</strong><span>ENCUENTROS</span></div><div class="stat-track"><span class="track-blue"></span></div></article>
          <article class="stat-card"><span class="stat-symbol">✓</span><p>FINALIZADOS</p><div class="stat-number"><strong id="stat-finalizados">0</strong><span>RESULTADOS</span></div><div class="stat-track"><span class="track-pink"></span></div></article>
        </div>
        <div class="dashboard-grid">
          <div class="panel"><div class="panel-heading"><div><span class="section-index">02 — FIXTURES</span><h3>Lo que viene <span class="heading-star">✳</span></h3><p>Encuentros programados para los próximos días.</p></div><button class="btn btn-outline" data-go="partidos">Ver calendario ↗</button></div><div id="home-matches" class="table-wrap"></div></div>
          <div class="panel"><div class="panel-heading"><div><span class="section-index">03 — TOP CLUBES</span><h3>El podio <span class="heading-star">★</span></h3><p>Los equipos que mandan en la cancha.</p></div><button class="round-action" data-go="posiciones" aria-label="Ver ranking">↗</button></div><div id="home-standings" class="leaders"></div></div>
        </div>
      </section>

      <section id="view-equipos" class="view hidden"><div class="panel big-panel"><div class="panel-heading"><div><span class="section-index">01 — CLUB MANAGER</span><h3>Equipos de la liga <span class="heading-star">◈</span></h3><p>Organiza los clubes y sus entrenadores.</p></div><span class="module-badge">CLUBES</span></div><form id="form-equipo" class="form-grid"><label>Nombre del equipo<input name="nombre" required minlength="2" maxlength="60" placeholder="Ej. Cóndores BC"></label><label>Director técnico<input name="entrenador" maxlength="60" placeholder="Nombre del entrenador"></label><label>Ciudad<input name="ciudad" maxlength="60" placeholder="Ej. Abancay"></label><button class="btn btn-accent form-button">＋ Registrar equipo</button></form><div class="table-toolbar"><h4>Todos los equipos <span id="count-equipos" class="count">0</span></h4><input class="search-input" data-search="equipos" placeholder="⌕  Buscar equipo o ciudad" aria-label="Buscar equipos"></div><div id="list-equipos" class="table-wrap"></div></div></section>

      <section id="view-jugadores" class="view hidden"><div class="panel big-panel"><div class="panel-heading"><div><span class="section-index">02 — ROSTER CONTROL</span><h3>Plantillas y dorsales <span class="heading-star">♟</span></h3><p>Registra a los jugadores que hacen la diferencia.</p></div><span class="module-badge">ATLETAS</span></div><form id="form-jugador" class="form-grid"><label>Nombre completo<input name="nombre" required minlength="2" maxlength="80" placeholder="Nombre del jugador"></label><label>Dorsal<input name="numero" type="number" required min="0" max="99" placeholder="Ej. 23"></label><label>Club<select name="equipo" id="jugador-equipo" required></select></label><button class="btn btn-accent form-button">＋ Añadir jugador</button></form><div class="table-toolbar"><h4>Plantillas <span id="count-jugadores" class="count">0</span></h4><input class="search-input" data-search="jugadores" placeholder="⌕  Buscar jugador o club" aria-label="Buscar jugadores"></div><div id="list-jugadores" class="table-wrap"></div></div></section>

      <section id="view-partidos" class="view hidden"><div class="panel big-panel"><div class="panel-heading"><div><span class="section-index">03 — MATCH CENTER</span><h3>Calendario oficial <span class="heading-star">⌁</span></h3><p>Programa encuentros y anota los resultados.</p></div><span class="module-badge">FIXTURES</span></div><form id="form-partido" class="form-grid"><label>Club local<select name="local" id="partido-local" required></select></label><label>Club visitante<select name="visitante" id="partido-visitante" required></select></label><label>Fecha de juego<input type="date" name="fecha" id="partido-fecha" required></label><button class="btn btn-accent form-button">＋ Programar juego</button></form><div class="table-toolbar"><h4>Todos los partidos <span id="count-partidos" class="count">0</span></h4><div class="filters"><select id="match-filter" aria-label="Filtrar encuentros"><option value="todos">Todos los estados</option><option value="programado">Programados</option><option value="finalizado">Finalizados</option></select><input class="search-input" data-search="partidos" placeholder="⌕  Buscar clubes" aria-label="Buscar partidos"></div></div><div id="list-partidos" class="table-wrap"></div></div></section>

      <section id="view-posiciones" class="view hidden"><div class="panel big-panel"><div class="panel-heading"><div><span class="section-index">04 — LEAGUE RANKING</span><h3>La carrera por el título <span class="heading-star">★</span></h3><p>Los resultados actualizan esta clasificación al instante.</p></div><span class="module-badge">RANKING</span></div><div class="ranking-strip"><strong>EL CAMPEÓN SE GANA EN LA CANCHA.</strong><span>VICTORIAS · DIFERENCIA · PUNTOS</span></div><div id="list-posiciones" class="table-wrap"></div><p class="footnote">PJ = partidos jugados · PG = ganados · PP = perdidos · PF = puntos anotados · PC = puntos recibidos · DIF = diferencia.</p></div></section>

      <section id="view-respaldo" class="view hidden"><div class="panel big-panel"><div class="panel-heading"><div><span class="section-index">05 — DATA CONTROL</span><h3>Tu liga, tus datos <span class="heading-star">↗</span></h3><p>Guarda una copia o vuelve a los resultados de demostración.</p></div><span class="module-badge">BACKUP</span></div><div class="backup-grid"><div class="backup-card"><span class="backup-icon">↓</span><h4>Exportar campeonato</h4><p>Descarga los equipos, jugadores y resultados en un archivo JSON.</p><button id="export-btn" class="btn btn-accent">↓ Descargar JSON</button></div><div class="backup-card"><span class="backup-icon">↑</span><h4>Importar respaldo</h4><p>Restaura los registros de esta aplicación desde un archivo JSON.</p><form id="form-import"><input type="file" name="archivo" accept=".json,application/json" required><button class="btn btn-outline">↑ Restaurar datos</button></form></div></div><div class="demo-reset"><div><strong>¿VOLVEMOS A JUGAR?</strong><p>Restaura los equipos y resultados de ejemplo para repetir tu presentación.</p></div><button id="reset-demo" class="btn btn-outline">↻ Reiniciar demostración</button></div></div></section>

      <footer><span>✳</span> ARENA 26 — BASKET LEAGUE OS <span class="footer-right">PROYECTO ACADÉMICO · DATOS JSON EN EL SERVIDOR</span></footer>
    </main>
  </div>

  <dialog id="record-dialog"><form id="form-dialog"><header class="modal-header"><div><span class="section-index" id="modal-kicker">EDITAR</span><h3 id="modal-title">Modificar registro</h3></div><button type="button" class="icon-button" data-close aria-label="Cerrar">✕</button></header><div id="modal-fields" class="modal-fields"></div><div class="modal-actions"><button type="button" class="btn btn-ghost" data-close>Cancelar</button><button class="btn btn-accent">Guardar cambios</button></div></form></dialog>
  <div id="toast" role="status" aria-live="polite"></div>
</body>
</html>
