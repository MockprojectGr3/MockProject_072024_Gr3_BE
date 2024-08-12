package com.mock.bodyguards.repository;

import com.mock.bodyguards.entity.TrainingCatalog;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface TrainingCatalogRepository extends JpaRepository<TrainingCatalog, Long> {
}
