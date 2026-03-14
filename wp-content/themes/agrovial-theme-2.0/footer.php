    <footer class="bg-primary py-16">
      <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-12 mb-12">
          <!-- Brand -->
          <div class="lg:col-span-2">
            <a href="<?php echo home_url(); ?>" class="flex items-center mb-4">
              <?php if ( has_custom_logo() ) : ?>
                  <?php 
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
                  ?>
                  <img src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="h-10 w-auto brightness-0 invert" />
              <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-agrovial.png" alt="Agrovial Sur" class="h-10 w-auto brightness-0 invert" />
              <?php endif; ?>
            </a>
            <p class="text-primary-foreground/70 mb-6 max-w-sm">
              Infraestructura para el desarrollo productivo de Río Negro.
              Capacidad operativa, equipo técnico y compromiso en cada proyecto.
            </p>
            <div class="flex gap-3">
                <a href="#" aria-label="Facebook" class="w-10 h-10 rounded-lg bg-primary-foreground/10 flex items-center justify-center text-primary-foreground hover:bg-secondary hover:text-secondary-foreground transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                </a>
                <a href="#" aria-label="Instagram" class="w-10 h-10 rounded-lg bg-primary-foreground/10 flex items-center justify-center text-primary-foreground hover:bg-secondary hover:text-secondary-foreground transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                </a>
                <a href="#" aria-label="LinkedIn" class="w-10 h-10 rounded-lg bg-primary-foreground/10 flex items-center justify-center text-primary-foreground hover:bg-secondary hover:text-secondary-foreground transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                </a>
            </div>
          </div>

          <!-- Servicios -->
          <div>
            <h4 class="font-display text-lg text-primary-foreground mb-4">SERVICIOS</h4>
            <ul class="space-y-3">
                  <li>
                    <a href="<?php echo home_url('/servicios/'); ?>#movimiento-de-suelo" class="text-primary-foreground/70 hover:text-secondary transition-colors">Movimiento de Suelo</a>
                  </li>
                  <li>
                    <a href="<?php echo home_url('/servicios/'); ?>#hormigon-elaborado" class="text-primary-foreground/70 hover:text-secondary transition-colors">Hormigón Elaborado</a>
                  </li>
                  <li>
                    <a href="<?php echo home_url('/servicios/'); ?>#obras-de-gas" class="text-primary-foreground/70 hover:text-secondary transition-colors">Obras de Gas</a>
                  </li>
                  <li>
                    <a href="<?php echo home_url('/servicios/'); ?>#infraestructura-sanitaria" class="text-primary-foreground/70 hover:text-secondary transition-colors">Infraestructura Sanitaria</a>
                  </li>
                  <li>
                    <a href="<?php echo home_url('/servicios/'); ?>#obras-civiles" class="text-primary-foreground/70 hover:text-secondary transition-colors">Obras Civiles</a>
                  </li>
            </ul>
          </div>

          <!-- Empresa -->
          <div>
            <h4 class="font-display text-lg text-primary-foreground mb-4">EMPRESA</h4>
            <ul class="space-y-3">
                  <li>
                    <a href="<?php echo home_url('/la-empresa/'); ?>" class="text-primary-foreground/70 hover:text-secondary transition-colors">La Empresa</a>
                  </li>
                  <li>
                    <a href="<?php echo home_url('/proyectos/'); ?>" class="text-primary-foreground/70 hover:text-secondary transition-colors">Proyectos</a>
                  </li>
                  <li>
                    <a href="<?php echo home_url('#contacto'); ?>" class="text-primary-foreground/70 hover:text-secondary transition-colors">Contacto</a>
                  </li>
            </ul>
          </div>

          <!-- Legal -->
          <div>
            <h4 class="font-display text-lg text-primary-foreground mb-4">LEGAL</h4>
            <ul class="space-y-3">
                  <li>
                    <a href="#" class="text-primary-foreground/70 hover:text-secondary transition-colors">Política de Privacidad</a>
                  </li>
                  <li>
                    <a href="#" class="text-primary-foreground/70 hover:text-secondary transition-colors">Términos de Servicio</a>
                  </li>
                  <li>
                    <a href="#" class="text-primary-foreground/70 hover:text-secondary transition-colors">Aviso Legal</a>
                  </li>
            </ul>
          </div>
        </div>

        <!-- Bottom Bar -->
        <div class="pt-8 border-t border-primary-foreground/20">
          <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-primary-foreground/60 text-sm">
              © <?php echo date('Y'); ?> Agrovial Sur. Todos los derechos reservados.
            </p>
            <p class="text-primary-foreground/60 text-sm">
              Infraestructura para el desarrollo productivo de Río Negro.
            </p>
          </div>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('mobile-menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            const iconMenu = document.getElementById('icon-menu');
            const iconClose = document.getElementById('icon-close');
            const mobileLinks = document.querySelectorAll('.mobile-link');

            function toggleMenu() {
                mobileMenu.classList.toggle('hidden');
                iconMenu.classList.toggle('hidden');
                iconClose.classList.toggle('hidden');
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', toggleMenu);
            }
            
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                   if (!mobileMenu.classList.contains('hidden')) {
                       toggleMenu();
                   }
                });
            });
        });
    </script>
</body>
</html>
