<?php
$phone = get_option('contact_phone', '+52 (55) 1234-5678');
$email = get_option('contact_email', 'contacto@constructoravial.mx');
$address = get_option('contact_address', 'Ciudad de México, México');
?>
<section id="contacto" class="py-20 md:py-32 bg-background">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary-alt text-sm font-medium mb-4">
                Contacto
            </span>
            <h2 class="font-display text-4xl md:text-5xl lg:text-6xl text-foreground mb-4">
                ¿LISTO PARA <span class="text-gradient">COMENZAR?</span>
            </h2>
            <p class="text-muted-foreground text-lg">
                Contáctenos para discutir su próximo proyecto vial. Nuestro equipo está listo para ayudarle.
            </p>
        </div>

        <div class="grid lg:grid-cols-5 gap-12">
            <!-- Contact Form -->
            <div class="lg:col-span-3">
                <form class="space-y-6 p-8 rounded-2xl bg-card shadow-card" action="#" method="POST">
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-card-foreground mb-2">
                                Nombre Completo
                            </label>
                            <input type="text" id="name" name="name" placeholder="Juan Pérez" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-border focus:ring-primary" required>
                        </div>
                        <div>
                            <label for="company" class="block text-sm font-medium text-card-foreground mb-2">
                                Empresa (opcional)
                            </label>
                            <input type="text" id="company" name="company" placeholder="Mi Empresa S.A." class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-border focus:ring-primary">
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-card-foreground mb-2">
                                Correo Electrónico
                            </label>
                            <input type="email" id="email" name="email" placeholder="juan@ejemplo.com" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-border focus:ring-primary" required>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-card-foreground mb-2">
                                Teléfono
                            </label>
                            <input type="tel" id="phone" name="phone" placeholder="+52 (55) 1234-5678" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-border focus:ring-primary">
                        </div>
                    </div>

                    <div>
                        <label for="service" class="block text-sm font-medium text-card-foreground mb-2">
                            Tipo de Servicio
                        </label>
                        <select id="service" name="service" class="w-full h-10 px-3 rounded-md border border-border bg-background text-foreground focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="">Seleccione un servicio</option>
                            <option value="publico">Sector Público</option>
                            <option value="privado">Sector Privado</option>
                            <option value="mantenimiento">Mantenimiento</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-card-foreground mb-2">
                            Mensaje
                        </label>
                        <textarea id="message" name="message" placeholder="Cuéntenos sobre su proyecto..." rows="5" class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-border focus:ring-primary resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-11 px-8 gradient-primary shadow-button hover:opacity-90 transition-opacity text-lg py-6 text-primary-foreground">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
                        Enviar Mensaje
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="lg:col-span-2 space-y-6">
                <a href="tel:+525512345678" class="flex items-start gap-4 p-5 rounded-xl bg-card shadow-card hover:shadow-card-hover transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-lg gradient-primary flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </div>
                    <div>
                        <div class="font-medium text-card-foreground mb-1">Teléfono</div>
                        <div class="text-muted-foreground"><?php echo esc_html($phone); ?></div>
                    </div>
                </a>
                
                <a href="mailto:<?php echo esc_attr($email); ?>" class="flex items-start gap-4 p-5 rounded-xl bg-card shadow-card hover:shadow-card-hover transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-lg gradient-primary flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    </div>
                    <div>
                        <div class="font-medium text-card-foreground mb-1">Correo Electrónico</div>
                        <div class="text-muted-foreground"><?php echo esc_html($email); ?></div>
                    </div>
                </a>

                <div class="flex items-start gap-4 p-5 rounded-xl bg-card shadow-card hover:shadow-card-hover transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-lg gradient-primary flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div>
                        <div class="font-medium text-card-foreground mb-1">Ubicación</div>
                        <div class="text-muted-foreground"><?php echo esc_html($address); ?></div>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-5 rounded-xl bg-card shadow-card hover:shadow-card-hover transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-lg gradient-primary flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-primary-foreground"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div>
                        <div class="font-medium text-card-foreground mb-1">Horario</div>
                        <div class="text-muted-foreground">Lun - Vie: 8:00 - 18:00</div>
                    </div>
                </div>

                <!-- CTA Card -->
                <div class="p-6 rounded-xl gradient-primary text-primary-foreground">
                    <h3 class="font-display text-2xl mb-2">¿Proyecto Urgente?</h3>
                    <p class="text-primary-foreground/90 mb-4 text-sm">
                        Llámenos directamente para atención inmediata en proyectos urgentes.
                    </p>
                    <a href="tel:+525512345678" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary-foreground text-primary font-medium hover:opacity-90 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        Llamar Ahora
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
