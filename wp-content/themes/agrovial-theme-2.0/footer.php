    <footer class="bg-primary py-16">
      <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-12 mb-12">
          <!-- Brand -->
          <div class="lg:col-span-2">
            <a href="#inicio" class="flex items-center mb-4">
              <img 
                src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-agrovial.png" 
                alt="Agrovial Sur" 
                class="h-10 w-auto brightness-0 invert"
              />
            </a>
            <p class="text-primary-foreground/70 mb-6 max-w-sm">
              Líderes en construcción de infraestructura vial desde 1999.
              Calidad, experiencia y compromiso en cada proyecto.
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
                <a href="#" aria-label="Twitter" class="w-10 h-10 rounded-lg bg-primary-foreground/10 flex items-center justify-center text-primary-foreground hover:bg-secondary hover:text-secondary-foreground transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                </a>
            </div>
          </div>

          <!-- Servicios -->
          <div>
            <h4 class="font-display text-lg text-primary-foreground mb-4">SERVICIOS</h4>
            <ul class="space-y-3">
                  <li>
                    <a href="#servicios" class="text-primary-foreground/70 hover:text-secondary transition-colors">Sector Público</a>
                  </li>
                  <li>
                    <a href="#servicios" class="text-primary-foreground/70 hover:text-secondary transition-colors">Sector Privado</a>
                  </li>
                  <li>
                    <a href="#" class="text-primary-foreground/70 hover:text-secondary transition-colors">Mantenimiento Vial</a>
                  </li>
                  <li>
                    <a href="#" class="text-primary-foreground/70 hover:text-secondary transition-colors">Consultoría</a>
                  </li>
            </ul>
          </div>

          <!-- Empresa -->
          <div>
            <h4 class="font-display text-lg text-primary-foreground mb-4">EMPRESA</h4>
            <ul class="space-y-3">
                  <li>
                    <a href="#nosotros" class="text-primary-foreground/70 hover:text-secondary transition-colors">Sobre Nosotros</a>
                  </li>
                  <li>
                    <a href="#" class="text-primary-foreground/70 hover:text-secondary transition-colors">Proyectos</a>
                  </li>
                  <li>
                    <a href="#" class="text-primary-foreground/70 hover:text-secondary transition-colors">Carreras</a>
                  </li>
                  <li>
                    <a href="#" class="text-primary-foreground/70 hover:text-secondary transition-colors">Blog</a>
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
              Construyendo el futuro de la infraestructura vial.
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
