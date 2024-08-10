package com.mock.bodyguards.repository;

import com.mock.bodyguards.entity.Example;
import jakarta.transaction.Transactional;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.stereotype.Repository;

import java.util.Optional;

@Repository
public interface ExampleRepository extends JpaRepository<Example, Long> {

    Optional<Example> findByMobileNumber(String mobileNumber);

    @Transactional
    @Modifying
    void deleteByMobileNumber(String mobileNumber);
}
