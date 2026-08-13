-- ============================================================
-- Migration: adds design-theme support to an EXISTING install.
-- Only run this if you already imported the original schema.sql.
-- If this is a fresh install, just use db/schema.sql instead —
-- it already includes the theme column.
-- ============================================================

ALTER TABLE landing_pages
  ADD COLUMN IF NOT EXISTS theme VARCHAR(50) NOT NULL DEFAULT 'classic' AFTER hero_image;
