   @extends('dashbaord.main')
    @section('content')
     <main>
            <section class="welcome-section fade-in">
                <div class="welcome-header">
                    <div class="welcome-text">
                        <h2>Bonjour, Professeur {{auth()->user()->nom}} 👋</h2>
                        <p>Bienvenue sur votre espace personnel. Voici un aperçu de votre journée et des activités à venir. </p>
                    </div>
                    <div class="welcome-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                </div>
                <div class="welcome-stats">
                    <div class="welcome-stat">
                        <i class="fas fa-chalkboard"></i>
                        <div>
                            <h3 id="todayCourses">3</h3>
                            <p>Cours aujourd'hui</p>
                        </div>
                    </div>
                    <div class="welcome-stat">
                        <i class="fas fa-clipboard-check"></i>
                        <div>
                            <h3 id="pendingAssignments">15</h3>
                            <p>Devoirs à corriger</p>
                        </div>
                    </div>
                    <div class="welcome-stat">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h3 id="unreadMessages">8</h3>
                            <p>Messages en attente</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Statistics Cards améliorés -->
            <div class="stats-grid">
                <div class="stat-card fade-in delay-1">
                    <div class="stat-info">
                        <div class="stat-data">
                            <h3>142</h3>
                            <p>Étudiants inscrits</p>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i>
                        <span>+8% ce semestre</span>
                    </div>
                </div>

                <div class="stat-card fade-in delay-1">
                    <div class="stat-info">
                        <div class="stat-data">
                            <h3>32h</h3>
                            <p>Heures de cours</p>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i>
                        <span>+5h cette semaine</span>
                    </div>
                </div>

                <div class="stat-card fade-in delay-2">
                    <div class="stat-info">
                        <div class="stat-data">
                            <h3>96%</h3>
                            <p>Taux de présence</p>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i>
                        <span>+3% vs dernier mois</span>
                    </div>
                </div>

                <div class="stat-card fade-in delay-3">
                    <div class="stat-info">
                        <div class="stat-data">
                            <h3>4.7</h3>
                            <p>Note moyenne</p>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="stat-trend trend-down">
                        <i class="fas fa-arrow-down"></i>
                        <span>-0.1 ce mois</span>
                    </div>
                </div>
            </div>

            <!-- Content Grid amélioré -->
            <div class="content-grid">
                <!-- Cours à venir amélioré -->
                <div class="dashboard-card fade-in delay-2">
                    <div class="card-header">
                        <h3><i class="fas fa-calendar-day"></i> Cours à venir</h3>
                        <a href="#">Voir agenda <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <ul class="course-list">
                        <li class="course-item">
                            <div class="course-time">
                                10:30 - 12:30
                            </div>
                            <div class="course-details">
                                <h4>Algorithmique Avancée</h4>
                                <p><i class="fas fa-map-marker-alt"></i> Salle B204 · Groupe INFO-4A</p>
                            </div>
                            <span class="course-status status-upcoming">À venir</span>
                        </li>
                        <li class="course-item">
                            <div class="course-time">
                                14:00 - 16:00
                            </div>
                            <div class="course-details">
                                <h4>Base de Données</h4>
                                <p><i class="fas fa-map-marker-alt"></i> Salle A107 · Groupe INFO-3B</p>
                            </div>
                            <span class="course-status status-upcoming">À venir</span>
                        </li>
                        <li class="course-item">
                            <div class="course-time">
                                09:00 - 11:00
                            </div>
                            <div class="course-details">
                                <h4>Réunion Département</h4>
                                <p><i class="fas fa-map-marker-alt"></i> Salle de conférence</p>
                            </div>
                            <span class="course-status status-upcoming">Demain</span>
                        </li>
                        <li class="course-item">
                            <div class="course-time">
                                11:30 - 13:30
                            </div>
                            <div class="course-details">
                                <h4>Intelligence Artificielle</h4>
                                <p><i class="fas fa-map-marker-alt"></i> Salle C305 · Groupe DSIA-2</p>
                            </div>
                            <span class="course-status status-upcoming">Demain</span>
                        </li>
                    </ul>
                </div>

                <!-- Tâches urgentes améliorées -->
                <div class="dashboard-card fade-in delay-3">
                    <div class="card-header">
                        <h3><i class="fas fa-tasks"></i> Tâches prioritaires</h3>
                        <a href="#">Voir toutes <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <ul class="task-list">
                        <li class="task-item">
                            <div class="task-checkbox">
                                <input type="checkbox" id="task1">
                                <label for="task1"></label>
                            </div>
                            <div class="task-details">
                                <h4>Corriger devoir Algorithmique</h4>
                                <p><i class="far fa-clock"></i> Échéance: Demain, 10:00</p>
                            </div>
                            <span class="task-priority priority-high">Haute</span>
                        </li>
                        <li class="task-item">
                            <div class="task-checkbox">
                                <input type="checkbox" id="task2" checked>
                                <label for="task2"></label>
                            </div>
                            <div class="task-details">
                                <h4>Préparer support cours IA</h4>
                                <p><i class="far fa-clock"></i> Complété · Pour jeudi</p>
                            </div>
                            <span class="task-priority priority-low">Terminé</span>
                        </li>
                        <li class="task-item">
                            <div class="task-checkbox">
                                <input type="checkbox" id="task3">
                                <label for="task3"></label>
                            </div>
                            <div class="task-details">
                                <h4>Envoyer notes mi-semestre</h4>
                                <p><i class="far fa-clock"></i> Échéance: Vendredi</p>
                            </div>
                            <span class="task-priority priority-high">Haute</span>
                        </li>
                        <li class="task-item">
                            <div class="task-checkbox">
                                <input type="checkbox" id="task4">
                                <label for="task4"></label>
                            </div>
                            <div class="task-details">
                                <h4>Répondre emails étudiants</h4>
                                <p><i class="far fa-clock"></i> 8 messages en attente</p>
                            </div>
                            <span class="task-priority priority-medium">Moyenne</span>
                        </li>
                        <li class="task-item">
                            <div class="task-checkbox">
                                <input type="checkbox" id="task5">
                                <label for="task5"></label>
                            </div>
                            <div class="task-details">
                                <h4>Préparer sujet examen</h4>
                                <p><i class="far fa-clock"></i> Pour validation département</p>
                            </div>
                            <span class="task-priority priority-medium">Moyenne</span>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    @endsection
