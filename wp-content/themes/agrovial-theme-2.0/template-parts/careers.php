<?php
/**
 * Careers Section - Trabaja con Nosotros
 * Cultura y valores | Formulario de CV | Referencias laborales
 */

$values = [
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
        'title' => 'Trabajo en Equipo',
        'desc'  => 'Creemos en la colaboración y el respeto mutuo como base de nuestro éxito.',
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>',
        'title' => 'Seguridad Primero',
        'desc'  => 'La seguridad de nuestro equipo es la prioridad número uno en cada obra.',
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>',
        'title' => 'Crecimiento Profesional',
        'desc'  => 'Ofrecemos oportunidades de capacitación y desarrollo continuo.',
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
        'title' => 'Compromiso Regional',
        'desc'  => 'Contribuimos al desarrollo de Río Negro generando empleo local de calidad.',
    ],
];

$references = [
    [
        'quote' => 'Agrovial Sur es un excelente lugar para trabajar. Hay un gran sentido de compañerismo y siempre se valora el esfuerzo.',
        'name'  => 'Operario con 10 años en la empresa',
    ],
    [
        'quote' => 'Me dieron la oportunidad de crecer profesionalmente. Empecé como técnico y hoy lidero un equipo de obra.',
        'name'  => 'Jefe de Obra',
    ],
    [
        'quote' => 'La empresa invierte en capacitación constante y se preocupa genuinamente por la seguridad del equipo.',
        'name'  => 'Ingeniero de Proyecto',
    ],
];
?>
<section id="trabaja" class="py-20 md:py-32 bg-background">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                Sumate al Equipo
            </span>
            <h2 class="font-display text-4xl md:text-5xl lg:text-6xl text-foreground mb-4">
                TRABAJA <span class="text-gradient">CON NOSOTROS</span>
            </h2>
            <p class="text-muted-foreground text-lg">
                Buscamos personas comprometidas que quieran construir el futuro de la infraestructura en Río Negro.
            </p>
        </div>

        <!-- Cultura y Valores -->
        <div class="mb-16">
            <h3 class="font-display text-2xl md:text-3xl text-foreground text-center mb-8">
                NUESTRA CULTURA Y VALORES
            </h3>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($values as $key => $val) : ?>
                <div class="p-6 rounded-xl bg-card shadow-card hover:shadow-card-hover transition-all duration-300 group text-center" style="animation-delay: <?php echo $key * 0.1; ?>s">
                    <div class="w-14 h-14 rounded-xl gradient-primary flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <?php echo $val['icon']; ?>
                    </div>
                    <h4 class="font-display text-xl text-card-foreground mb-2">
                        <?php echo esc_html($val['title']); ?>
                    </h4>
                    <p class="text-muted-foreground text-sm"><?php echo esc_html($val['desc']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="grid lg:grid-cols-5 gap-12">
            <!-- Formulario de CV -->
            <div class="lg:col-span-3">
                <h3 class="font-display text-2xl md:text-3xl text-foreground mb-6">
                    ENVIANOS TU CV
                </h3>
                <form class="space-y-6 p-8 rounded-2xl bg-card shadow-card" action="#" method="POST" enctype="multipart/form-data" id="careers-form">
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label for="career_name" class="block text-sm font-medium text-card-foreground mb-2">
                                Nombre Completo *
                            </label>
                            <input type="text" id="career_name" name="career_name" placeholder="Juan Pérez" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 border-border focus:ring-primary" required>
                        </div>
                        <div>
                            <label for="career_email" class="block text-sm font-medium text-card-foreground mb-2">
                                Correo Electrónico *
                            </label>
                            <input type="email" id="career_email" name="career_email" placeholder="juan@ejemplo.com" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 border-border focus:ring-primary" required>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label for="career_phone" class="block text-sm font-medium text-card-foreground mb-2">
                                Teléfono *
                            </label>
                            <input type="tel" id="career_phone" name="career_phone" placeholder="+54 (299) 123-4567" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 border-border focus:ring-primary" required>
                        </div>
                        <div>
                            <label for="career_area" class="block text-sm font-medium text-card-foreground mb-2">
                                Área de Interés
                            </label>
                            <select id="career_area" name="career_area" class="w-full h-10 px-3 rounded-md border border-border bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="">Seleccione un área</option>
                                <option value="operario">Operario / Maquinista</option>
                                <option value="tecnico">Técnico</option>
                                <option value="ingenieria">Ingeniería</option>
                                <option value="administracion">Administración</option>
                                <option value="taller">Taller / Mantenimiento</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="career_experience" class="block text-sm font-medium text-card-foreground mb-2">
                            Experiencia Laboral (breve descripción)
                        </label>
                        <textarea id="career_experience" name="career_experience" placeholder="Cuéntanos brevemente sobre tu experiencia laboral..." rows="3" class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 border-border focus:ring-primary resize-none"></textarea>
                    </div>

                    <div>
                        <label for="career_cv" class="block text-sm font-medium text-card-foreground mb-2">
                            Adjuntar CV (PDF, DOC, DOCX) *
                        </label>
                        <div class="flex items-center gap-4">
                            <input type="file" id="career_cv" name="career_cv" accept=".pdf,.doc,.docx" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 border-border focus:ring-primary" required>
                        </div>
                        <p class="text-xs text-muted-foreground mt-1">Máximo 5 MB</p>
                    </div>

                    <div>
                        <label for="career_references" class="block text-sm font-medium text-card-foreground mb-2">
                            Referencias Laborales (opcional)
                        </label>
                        <textarea id="career_references" name="career_references" placeholder="Nombre, empresa, teléfono de contacto de hasta 2 referencias..." rows="3" class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 border-border focus:ring-primary resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-11 px-8 gradient-primary shadow-button hover:opacity-90 transition-opacity text-lg py-6 text-primary-foreground">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
                        Enviar Postulación
                    </button>
                </form>
            </div>

            <!-- Referencias Laborales Sidebar -->
            <div class="lg:col-span-2 space-y-6">
                <h3 class="font-display text-2xl md:text-3xl text-foreground mb-4">
                    REFERENCIAS DE NUESTRO EQUIPO
                </h3>

                <?php foreach ($references as $ref) : ?>
                <div class="p-5 rounded-xl bg-card shadow-card hover:shadow-card-hover transition-all duration-300">
                    <div class="flex gap-1 mb-3">
                        <?php for ($i = 0; $i < 5; $i++) : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="hsl(var(--secondary))" stroke="hsl(var(--secondary))" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <?php endfor; ?>
                    </div>
                    <p class="text-muted-foreground text-sm mb-3 italic">
                        "<?php echo esc_html($ref['quote']); ?>"
                    </p>
                    <div class="text-sm font-medium text-card-foreground">
                        <?php echo esc_html($ref['name']); ?>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- CTA Card -->
                <div class="p-6 rounded-xl gradient-primary text-primary-foreground">
                    <h4 class="font-display text-2xl mb-2">¿Tenés preguntas?</h4>
                    <p class="text-primary-foreground/90 mb-4 text-sm">
                        Contactanos para conocer más sobre las oportunidades disponibles en Agrovial Sur.
                    </p>
                    <a href="#contacto" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary-foreground text-primary font-medium hover:opacity-90 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        Contactar
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
